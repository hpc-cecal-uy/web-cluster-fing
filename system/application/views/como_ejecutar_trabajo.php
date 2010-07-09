<div id="volver"><a href="<?php echo base_url();?>">volver</a></div>
<div id="content-wrapper">
<div id="content-container">
<div id="content">
<h1>Cómo ejecutar un trabajo</h1>
<div>
<h2>Índice</h2>
<ul>
	<li><a href='#Recursos'>Solicitud de recursos</a></li>
	<li><a href='#Serial'>Trabajo serial</a></li>
	<li><a href='#Paralelo'>Trabajo paralelo</a></li>
	<li><a href='#Distribuido'>Trabajo distribuido</a>
	<ul>
		<li><a href='#DistribuidoMPICH'>MPICH</a></li>
		<li><a href='#DistribuidoLAM'>LAM/MPI</a></li>
		<li><a href='#DistribuidoOpenMPI'>OpenMPI</a></li>
	</ul>
	</li>
</ul>
<h2>Solicitud de recursos<a name='Recursos' id='Recursos'></a></h2>
<p>Antes de iniciar un trabajo en el cluster es necesario solicitar los
recursos de cómputo que el trabajo requerirá para su ejecución. Existen
3 tipos de recursos que deben solicitarse:</p>
<ul>
	<li>Cantidad de nodos utilizados (nodes)</li>
	<li>Tiempo total de ejecución del trabajo (walltime)</li>
</ul>
<h3>Cantidad de nodos utilizados (nodes)</h3>
<p>A menos que se especifique lo contrario se asume que cada nodo
solicitado por un trabajo requiere una sola unidad de cómputo, es decir,
un solo CPU. Una máquina del cluster que cuenta con 8 CPU (p.ej.: dos
procesadores con cuatro núcleos cada uno) es equivalente a 8 nodos de un
solo CPU, esto quiere decir que una máquina de este tipo puede ejecutar
simultáneamente 8 trabajos que requieran un nodo cada uno.<br />
<br />
Ejemplos de solicitud de nodos:<br />
<pre class='escaped'>qsub -l nodes=12</pre><br />
Solicita 12 nodos de cualquier tipo con una unidad de cómputo (CPU) cada
uno.<br />
<br />
<pre class='escaped'>qsub -l nodes=2:server+14</pre><br />
Solicita 2 nodos con el atributo "server" y 14 nodos de cualquier tipo,
todos con una unidad de procesamiento. En total solicita 16 nodos.<br />
<br />
<pre class='escaped'>qsub -l
nodes=server:hippi+10:noserver+3:bigmem:hippi</pre><br />
Solicita un nodo que tenga los atributos "server" y "hippi", 10 nodos
con el atributo "notserver" y 3 nodos con los atributos "bigmem" y
"hippi".<br />
<br />
<pre class='escaped'>qsub -l
nodes=node02.cluster.fing+node03.cluster.fing+node09.cluster.fing</pre><br />
Solicita 3 nodos por nombre con una unidad de procesamiento por nodo.<br />
<br />
<pre class='escaped'>qsub -l nodes=4:ppn=2</pre><br />
Solicita 4 nodos con 2 unidades de procesamiento disponibles cada uno.
En total solicita 8 unidades de procesamiento.<br />
<br />
<pre class='escaped'>qsub -l nodes=1:ppn=4</pre><br />
Solicita 1 nodo con 4 unidades de procesamiento.<br />
<br />
<pre class='escaped'>qsub -l
nodes=2:blue:ppn=2+red:ppn=3+node12.cluster.fing</pre><br />
Solicita 2 nodos con el atributo "blue" con 2 unidades de procesamiento
disponibles cada uno, 2 nodos con el atributo "red" con 3 unidades de
procesamiento disponibles en cada uno y un nodo por nombre con una
unidad de procesamiento disponible.<br />
</p>
<h3>Tiempo total de ejecución del trabajo (walltime)</h3>
<p>Este recruso mide el tiempo total de ejecución de un trabajo, desde
que es iniciado hasta que finaliza. Los trabajos que sobrepasen su
tiempo walltime serán detenidos y el usuario perderá la ejecución del
trabajo. Es conveniente realizar una estimación holgada del tiempo
walltime de un trabajo, se recomienda sobreestimar la duración del
trabajo en un 20%. No se debe abusar en la estimación del tiempo
walltime, trabajos que requieran demasiado tiempo de ejecución serán más
dificiles de ajustar a la planificación en el cluster por lo que pueden
ver demorado su inicio hasta que se encuentre un "hueco" lo
suficientemente grande en la planificación.<br />
Para especificar una hora de recurso walltime: <pre class='escaped'>walltime=01:00:00</pre><br />
<strong>Si un trabajo no especifica un tiempo walltime su valor por
defecto será de 12 horas.</strong><br />
</p>
<h2>Trabajo serial<a name='Serial' id='Serial'></a></h2>
<p>Esqueleto de un script de ejecución de un trabajo serial:</p>
<pre class='escaped'>#!/bin/bash

# Nombre del trabajo
#PBS -N &lt;Nombre del trabajo&gt;

# Requerimientos
# En este caso nuestro trabajo requiere: 1 procesador, 1 hora de ejecución.
#PBS -l nodes=1,walltime=01:00:00

# Cola de ejecución
#PBS -q publica

# Directorio de trabajo
#PBS -d /home/siturria/&lt;directorio_trabajo&gt;

# Correo electronico
#PBS -M &lt;mi_email&gt;@fing.edu.uy

# Email
#PBS -m abe
# n: no mail will be sent.
# a: mail is sent when the job is aborted by the batch system.
# b: mail is sent when the job begins execution.
# e: mail is sent when the job terminates.

# Directorio donde se guardará la salida estándar y de error de nuestro trabajo
#PBS -e /home/siturria/&lt;directorio_trabajo&gt;/
#PBS -o /home/siturria/&lt;directorio_trabajo&gt;/

# Will make  all variables defined in the environment from which the job is submitted available to the job.
#PBS -V

echo Job Name: $PBS_JOBNAME
echo Working directory: $PBS_O_WORKDIR
echo Queue: $PBS_QUEUE
echo Cantidad de tasks: $PBS_TASKNUM
echo Home: $PBS_O_HOME
echo Puerto del MOM: $PBS_MOMPORT
echo Nombre del usuario: $PBS_O_LOGNAME
echo Idioma: $PBS_O_LANG
echo Cookie: $PBS_JOBCOOKIE
echo Offset de numero de nodos: $PBS_NODENUM
echo Shell: $PBS_O_SHELL
echo JobID: $PBS_O_JOBID
echo Host: $PBS_O_HOST
echo Cola de ejecucion: $PBS_QUEUE
echo Archivo de nodos: $PBS_NODEFILE
echo Path: $PBS_O_PATH
echo
cd $PBS_O_WORKDIR
echo Current path:
pwd
echo
echo NODES
cat $PBS_NODEFILE

# Ejecuto la tarea
time ./&lt;Ejecutable de nuestro trabajo&gt;</pre>

<h2>Trabajo paralelo<a name='Paralelo' id='Paralelo'></a></h2>
<p>Debemos solicitar que todos los procesadores que sean asignados a
nuestro trabajo se encuentren en el mismo nodo físico del cluster. Un
posible esqueleto de script para un trabajo que utiliza OpenMP para
paralelizar su ejecución es el que sigue:</p>
<pre class='escaped'>#!/bin/bash

# Nombre del trabajo
#PBS -N &lt;Nombre del trabajo&gt;

# Requerimientos
# En este caso nuestro trabajo requiere: 1 nodo con 4 procesadores disponibles, 1 hora de ejecución.
#PBS -l nodes=1:ppn=4,walltime=01:00:00

# Cola de ejecución
#PBS -q publica

# Directorio de trabajo
#PBS -d /home/siturria/&lt;directorio_trabajo&gt;

# Correo electronico
#PBS -M &lt;mi_email&gt;@fing.edu.uy

# Email
#PBS -m abe
# n: no mail will be sent.
# a: mail is sent when the job is aborted by the batch system.
# b: mail is sent when the job begins execution.
# e: mail is sent when the job terminates.

# Directorio donde se guardará la salida estándar y de error de nuestro trabajo
#PBS -e /home/siturria/&lt;directorio_trabajo&gt;/
#PBS -o /home/siturria/&lt;directorio_trabajo&gt;/

# Will make  all variables defined in the environment from which the job is submitted available to the job.
#PBS -V

echo Job Name: $PBS_JOBNAME
echo Working directory: $PBS_O_WORKDIR
echo Queue: $PBS_QUEUE
echo Cantidad de tasks: $PBS_TASKNUM
echo Home: $PBS_O_HOME
echo Puerto del MOM: $PBS_MOMPORT
echo Nombre del usuario: $PBS_O_LOGNAME
echo Idioma: $PBS_O_LANG
echo Cookie: $PBS_JOBCOOKIE
echo Offset de numero de nodos: $PBS_NODENUM
echo Shell: $PBS_O_SHELL
echo Host: $PBS_O_HOST
echo Cola de ejecucion: $PBS_QUEUE
echo Archivo de nodos: $PBS_NODEFILE
echo Path: $PBS_O_PATH
echo
cd $PBS_O_WORKDIR
echo Current path:
pwd
echo
echo Nodos:
cat $PBS_NODEFILE
echo
echo Cantidad de nodos:
NPROCS=$(wc -l &lt; $PBS_NODEFILE)
echo $NPROCS
echo
export OMP_SCHEDULE="DYNAMIC,1"
export OMP_NUM_THREADS=$NPROCS
time ./&lt;Ejecutable de nuestro trabajo&gt;</pre>

<h2>Trabajo distribuido<a name='Distribuido' id='Distribuido'></a></h2>

<p>Antes de compilar y ejecutar un programa que utilice una
implementación de MPI es necesario configurar el entorno de nuestro
usuario del cluster y especificar qué implementación de MPI se desea
utilizar. Para obtener una lista de las implementaciónes de MPI
disponibles en el cluster se debe ejecutar:</p>
<pre class='escaped'>[siturria@cluster ~]$ switcher mpi --list
mpich-ch_p4-gcc-1.2.7
openmpi-1.2.5
lam-7.1.4</pre>
<p>Para configurar el uso de la implementación MPICH se
debe ejecutar: <pre class='escaped'>[siturria@cluster ~]$ switcher mpi = mpich-ch_p4-gcc-1.2.7</pre></p>
<p>Finalmente podemos verificar que la configuración sea
la correcta ejecutando el siguiente comando: <pre class='escaped'>[siturria@cluster
mom_logs]$ switcher mpi --user</pre></p>
<p>Una vez definida una implementación de MPI para
nuestro usuario los comandos MPI (p.ej.: mpicc, mpiCC, mpirun, etc.)
quedaran definidos de forma global en el cluster y podrémos ejecutarlos
sin inconvenientes desde cualquier nodo.</p>
<p>Es necesario cerrar la conexión de la sesión actual e
iniciar una nueva conexión con el cluster para que la nueva
configuración tenga efecto.</p>
<div></div>
<h3>MPICH<a name='DistribuidoMPICH' id='DistribuidoMPICH'></a></h3>

<pre class='escaped'>#!/bin/bash

# Nombre del trabajo
#PBS -N &lt;Nombre del trabajo&gt;

# Requerimientos
# En este caso nuestro trabajo requiere: 16 procesadores, 1 hora de ejecución.
#PBS -l nodes=16,walltime=01:00:00

# Cola de ejecución
#PBS -q publica

# Directorio de trabajo
#PBS -d /home/siturria/&lt;directorio_trabajo&gt;

# Correo electronico
#PBS -M &lt;mi_email&gt;@fing.edu.uy

# Email
#PBS -m abe
# n: no mail will be sent.
# a: mail is sent when the job is aborted by the batch system.
# b: mail is sent when the job begins execution.
# e: mail is sent when the job terminates.

# Directorio donde se guardará la salida estándar y de error de nuestro trabajo
#PBS -e /home/siturria/&lt;directorio_trabajo&gt;/
#PBS -o /home/siturria/&lt;directorio_trabajo&gt;/

# Will make  all variables defined in the environment from which the job is submitted available to the job.
#PBS -V

echo Job Name: $PBS_JOBNAME
echo Working directory: $PBS_O_WORKDIR
echo Queue: $PBS_QUEUE
echo Cantidad de tasks: $PBS_TASKNUM
echo Home: $PBS_O_HOME
echo Puerto del MOM: $PBS_MOMPORT
echo Nombre del usuario: $PBS_O_LOGNAME
echo Idioma: $PBS_O_LANG
echo Cookie: $PBS_JOBCOOKIE
echo Offset de numero de nodos: $PBS_NODENUM
echo Shell: $PBS_O_SHELL
echo Host: $PBS_O_HOST
echo Cola de ejecucion: $PBS_QUEUE
echo Archivo de nodos: $PBS_NODEFILE
echo Path: $PBS_O_PATH
echo
cd $PBS_O_WORKDIR
echo Current path:
pwd
echo
echo Nodos:
cat $PBS_NODEFILE
echo
echo Cantidad de nodos:
NPROCS=$(wc -l &lt; $PBS_NODEFILE)
echo $NPROCS
echo
time mpirun -np $NPROCS -machinefile $PBS_NODEFILE ./&lt;Ejecutable de nuestro trabajo&gt; </pre>

<h3>LAM/MPI<a name='DistribuidoLAM' id='DistribuidoLAM'></a></h3>
<pre class='escaped'>#!/bin/bash

# Nombre del trabajo
#PBS -N &lt;Nombre del trabajo&gt;

# Requerimientos
# En este caso nuestro trabajo requiere: 16 procesadores, 1 hora de ejecución.
#PBS -l nodes=16,walltime=01:00:00

# Cola de ejecución
#PBS -q publica

# Directorio de trabajo
#PBS -d /home/siturria/&lt;directorio_trabajo&gt;

# Correo electronico
#PBS -M &lt;mi_email&gt;@fing.edu.uy

# Email
#PBS -m abe
# n: no mail will be sent.
# a: mail is sent when the job is aborted by the batch system.
# b: mail is sent when the job begins execution.
# e: mail is sent when the job terminates.

# Directorio donde se guardará la salida estándar y de error de nuestro trabajo
#PBS -e /home/siturria/&lt;directorio_trabajo&gt;/
#PBS -o /home/siturria/&lt;directorio_trabajo&gt;/

# Will make  all variables defined in the environment from which the job is submitted available to the job.
#PBS -V

echo Job Name: $PBS_JOBNAME
echo Working directory: $PBS_O_WORKDIR
echo Queue: $PBS_QUEUE
echo Cantidad de tasks: $PBS_TASKNUM
echo Home: $PBS_O_HOME
echo Puerto del MOM: $PBS_MOMPORT
echo Nombre del usuario: $PBS_O_LOGNAME
echo Idioma: $PBS_O_LANG
echo Cookie: $PBS_JOBCOOKIE
echo Offset de numero de nodos: $PBS_NODENUM
echo Shell: $PBS_O_SHELL
echo Host: $PBS_O_HOST
echo Cola de ejecucion: $PBS_QUEUE
echo Archivo de nodos: $PBS_NODEFILE
echo Path: $PBS_O_PATH
echo
cd $PBS_O_WORKDIR
echo Current path:
pwd
echo
echo Nodos:
cat $PBS_NODEFILE
echo
echo Cantidad de nodos:
NPROCS=$(wc -l &lt; $PBS_NODEFILE)
echo $NPROCS
echo
lamboot
time mpiexec ./&lt;Ejecutable de nuestro trabajo&gt;

lamhalt</pre>
<h3>OpenMPI<a name='DistribuidoOpenMPI' id='DistribuidoOpenMPI'></a></h3>
<pre class='escaped'>#!/bin/bash

# Nombre del trabajo
#PBS -N &lt;Nombre del trabajo&gt;

# Requerimientos
# En este caso nuestro trabajo requiere: 16 procesadores, 1 hora de ejecución.
#PBS -l nodes=16,walltime=01:00:00

# Cola de ejecución
#PBS -q publica

# Directorio de trabajo
#PBS -d /home/siturria/&lt;directorio_trabajo&gt;

# Correo electronico
#PBS -M &lt;mi_email&gt;@fing.edu.uy

# Email
#PBS -m abe
# n: no mail will be sent.
# a: mail is sent when the job is aborted by the batch system.
# b: mail is sent when the job begins execution.
# e: mail is sent when the job terminates.

# Directorio donde se guardará la salida estándar y de error de nuestro trabajo
#PBS -e /home/siturria/&lt;directorio_trabajo&gt;/
#PBS -o /home/siturria/&lt;directorio_trabajo&gt;/

# Will make  all variables defined in the environment from which the job is submitted available to the job.
#PBS -V

echo Job Name: $PBS_JOBNAME
echo Working directory: $PBS_O_WORKDIR
echo Queue: $PBS_QUEUE
echo Cantidad de tasks: $PBS_TASKNUM
echo Home: $PBS_O_HOME
echo Puerto del MOM: $PBS_MOMPORT
echo Nombre del usuario: $PBS_O_LOGNAME
echo Idioma: $PBS_O_LANG
echo Cookie: $PBS_JOBCOOKIE
echo Offset de numero de nodos: $PBS_NODENUM
echo Shell: $PBS_O_SHELL
echo Host: $PBS_O_HOST
echo Cola de ejecucion: $PBS_QUEUE
echo Archivo de nodos: $PBS_NODEFILE
echo Path: $PBS_O_PATH
echo
cd $PBS_O_WORKDIR
echo Current path:
pwd
echo
echo Nodos:
cat $PBS_NODEFILE
echo
echo Cantidad de nodos:
NPROCS=$(wc -l &lt; $PBS_NODEFILE)
echo $NPROCS
echo
time mpiexec -np $NPROCS -machinefile $PBS_NODEFILE ./&lt;Ejecutable de nuestro trabajo&gt;</pre>
</div>
</div>
</div>
</div>
