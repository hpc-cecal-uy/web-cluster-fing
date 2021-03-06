<div id="content">
<h1>Cómo ejecutar un trabajo</h1>
<div id="content-body">
<h2>Índice</h2>
<ul>
	<li><a href='#Recursos'>Solicitud de recursos</a></li>
	<li><a href='#Script'>Describir un trabajo</a>
	<ul>
		<li><a href='#Serial'>Trabajo serial</a></li>
		<li><a href='#Paralelo'>Trabajo paralelo</a></li>
		<li><a href='#Distribuido'>Trabajo distribuido</a>
		<ul>
			<li><a href='#DistribuidoMPICH'>MPICH</a></li>
		</ul>
	</ul>
	</li>
	<li><a href='#Iniciar'>Iniciar un trabajo</a></li>
	<li><a href='#IniciarConDependencia'>Iniciar un trabajo que depende de otro trabajo</a></li>
</ul>
<h2>Solicitud de recursos<a name='Recursos' id='Recursos'></a></h2>
<p>Antes de iniciar un trabajo en el cluster es necesario solicitar los
recursos de cómputo que el trabajo requerirá para su ejecución. Existen
dos tipos de recursos que deben solicitarse:</p>
<ul>
	<li>Nodos utilizados</li>
	<li>Tiempo total de ejecución del trabajo (walltime)</li>
</ul>
<h3>Nodos utilizados</h3>
<p>Debe especificarse la cantidad de nodos que requiere un trabajo para
su ejecución. A menos que se especifique lo contrario cada nodo
solicitado por un trabajo equivale a un CPU del cluster, i.e., una
máquina del cluster que cuenta con 8 CPU es equivalente a 8 nodos. Una
máquina con 8 CPU puede ejecutar simultáneamente 8 trabajos que
requieran un nodo cada uno.<br />
<br />
Además de las cantidad de nodos requeridos, pueden solicitarse nodos
según sus características o por su nombre. Actualmente el cluster se
encuentra compuesto por los siguientes nodos.
<table cellpadding="5px" cellspacing="5px">
	<tr style="font-weight:bold;">
		<td>Nombre</td>
		<td>#</td>
		<td>Atributos</td>
		<td>Características de cada máquina</td>
		<td nowrap="nowrap"></td>
	</tr>
	<tr>
		<td>node02-09</td>
		<td>8</td>
		<td>class0</td>
		<td>8 núcleos y 8 GB de RAM</td>
		<td></td>
	</tr>
	<tr>
		<td>node20-21</td>
		<td>2</td>
		<td>class1</td>
		<td>8 núcleos y 24 GB de RAM</td>
		<td></td>
	</tr>
	<tr>
		<td>node30-32</td>
		<td>3</td>
		<td>class2</td>
		<td>24 núcleos y 24 GB de RAM</td>
		<td></td>
	</tr>
	<tr>
		<td>node33-34</td>
		<td>2</td>
		<td>class3</td>
		<td>24 núcleos y 72 GB de RAM</td>
		<td></td>
	</tr>
	<tr>
        <td>node50-53</td>
        <td>4</td>
        <td>class5</td>
        <td>16 núcleos y 64 GB de RAM</td>
        <td></td>
    </tr>
	<!--<tr style="color: red;">
		<td>tesla</td>
		<td>1</td>
		<td>gpu</td>
		<td>8 núcleos, 48 GB de RAM, 4 tarjetas nVidia C1060</td>
		<td nowrap="nowrap">* no accesible</td>
	</tr>-->
</table>
<br />
<br />
Ejemplos de solicitud de nodos:<br />
<pre class='escaped'>qsub -l nodes=12</pre><br />
Solicita 12 nodos de cualquier tipo con una unidad de cómputo (CPU) cada
uno. En total se solicitan 12 CPU que pueden estar distribuidos entre cualquier 
máquina del cluster.<br />
<br />
<pre class='escaped'>qsub -l nodes=2:class0+14</pre><br />
Solicita 2 nodos con el atributo "class0" y 14 nodos de cualquier tipo,
todos con una unidad de procesamiento. En total solicita 16 CPU.<br />
<br />
<pre class='escaped'>qsub -l nodes=1:class0+10:class1+3:class2</pre><br />
Solicita un nodo que tenga el atributo "class0", 10 nodos
con el atributo "class1" y 3 nodos con el atributo "class2". En total
se solicitan 14 CPU.<br />
<br />
<pre class='escaped'>qsub -l nodes=node02.cluster.fing+node03.cluster.fing+node09.cluster.fing</pre><br />
Solicita 3 nodos por nombre con una unidad de procesamiento por nodo.
En total se solicitan 3 CPU.<br />
<br />
<pre class='escaped'>qsub -l nodes=1:ppn=4</pre><br />
Solicita 1 nodo con 4 unidades de procesamiento. Es decir que al trabajo se le asignarán
4 CPU pero estos deben estar en la misma máquina.<br />
<br />
<pre class='escaped'>qsub -l nodes=4:ppn=2</pre><br />
Solicita 4 nodos con 2 unidades de procesamiento disponibles cada uno. En total solicitan 8 CPU.<br />
<br />
<pre class='escaped'>qsub -l nodes=2:class0:ppn=2+1:class1:ppn=3+node12.cluster.fing</pre><br />
Solicita 2 nodos con el atributo "class0" con 2 unidades de procesamiento
disponibles cada uno, 2 nodos con el atributo "class1" con 3 unidades de
procesamiento disponibles en cada uno y un nodo por nombre con una
unidad de procesamiento disponible. En total se solicitan 8 CPU.<br />
</p>
<h3>Tiempo total de ejecución del trabajo (walltime)</h3>
<p>Este recurso mide el tiempo total de ejecución de un trabajo, desde
que es iniciado hasta que finaliza. <u><b>Un trabajo será detenido si su tiempo de ejecución
sobrepasa el tiempo de walltime solicitado</b></u>. Es conveniente realizar una estimación holgada del tiempo
walltime de un trabajo, se recomienda sobreestimar la duración del
trabajo en un 20%. No se debe abusar en la estimación del tiempo
walltime, trabajos que requieran demasiado tiempo de ejecución serán más
dificiles de ajustar a la planificación en el cluster por lo que pueden
ver demorado su inicio hasta que se encuentre un "hueco" lo
suficientemente grande en la planificación.<br />
Para especificar una hora de recurso walltime: <pre class='escaped'>walltime=01:00:00</pre><br />
Si un trabajo no especifica un tiempo walltime, su valor por
defecto será de <b><u>12 horas</u></b>.
</p>
<h3>Colas de ejecución</h3>
<p>El cluster agrupa los trabajos en colas de ejecución. Todo trabajo debe ingresar a una de las 
colas de ejecución, pero cada cola de ejecución establece ciertas restricciones. Las colas de ejecución disponibles son:
<table cellpadding="5px" cellspacing="5px">
	<tr style="font-weight:bold;">
		<td>Nombre</td>
		<td>Cant. máx. de procesadores</td>
		<td>Cant. máx. de walltime</td>
	</tr>
	<tr>
                <td>serial</td>
                <td>hasta 1 proc.</td>
                <td>hasta 240 horas (7 días)</td>
        </tr>
	<tr>
		<td>small_jobs</td>
		<td>hasta 16 proc.</td>
		<td>hasta 240 horas (7 días)</td>
	</tr>
	<tr>
		<td>medium_jobs</td>
		<td>hasta 32 proc.</td>
		<td>hasta 96 horas (4 días)</td>
	</tr>
	<tr>
		<td>big_jobs</td>
		<td>sin limite</td>
		<td>hasta 48 horas (2 días)</td>
	</tr>
	<tr>
		<td>quick_jobs</td>
		<td>hasta 64 proc.</td>
		<td>hasta 4 horas</td>
	</tr>
</table>
</p>
<h2>Describir un trabajo<a name='Script' id='Script'></a></h2>
Para ejecutar un trabajo en el cluster es necesario proporcionarle al gestor una descripción del trabajo en cuestión.
Esta descripción se realiza en forma de un script, a continuación veremos algunos ejemplos de este script para diferentes tipos
de trabajos.

<h2>Trabajo serial<a name='Serial' id='Serial'></a></h2>
<p>Esqueleto de un script de ejecución de un trabajo serial:</p>
<pre class='escaped'>#!/bin/bash

# Nombre del trabajo
#PBS -N &lt;Nombre del trabajo&gt;

# Requerimientos
# En este caso nuestro trabajo requiere: 1 procesador, 1 hora de ejecución.
#PBS -l nodes=1,walltime=01:00:00

# Cola de ejecución
#PBS -q small_jobs

# Directorio de trabajo
#PBS -d &lt;ruta_absoluta_al_directorio_trabajo&gt;

# Correo electronico
#PBS -M &lt;mi_email&gt;@fing.edu.uy

# Email
#PBS -m abe
# n: no mail will be sent.
# a: mail is sent when the job is aborted by the batch system.
# b: mail is sent when the job begins execution.
# e: mail is sent when the job terminates.

# Directorio donde se guardará la salida estándar y de error de nuestro trabajo
#PBS -e &lt;ruta_absoluta_al_directorio_trabajo&gt;/
#PBS -o &lt;ruta_absoluta_al_directorio_trabajo&gt;/

<!-- SE QUITA ESTA LINEA PORQUE GENERA ERRORES EN ROCKS CLUSTER
# Will make  all variables defined in the environment from which the job is submitted available to the job.
#PBS -V
-->
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
time /&lt;ruta absoluta al ejecutable de nuestro trabajo&gt;</pre>

<h2>Trabajo paralelo<a name='Paralelo' id='Paralelo'></a></h2>
<p>Debemos solicitar que todos los procesadores que sean asignados a
nuestro trabajo se encuentren en el mismo nodo físico del cluster. Un
posible esqueleto de script para un trabajo que utiliza multithread para
paralelizar su ejecución es el que sigue:</p>
<pre class='escaped'>#!/bin/bash

# Nombre del trabajo
#PBS -N &lt;Nombre del trabajo&gt;

# Requerimientos
# En este caso nuestro trabajo requiere: 1 nodo con 4 procesadores disponibles, 1 hora de ejecución.
#PBS -l nodes=1:ppn=4,walltime=01:00:00

# Cola de ejecución
#PBS -q small_jobs

# Directorio de trabajo
#PBS -d &lt;ruta_absoluta_al_directorio_trabajo&gt;

# Correo electronico
#PBS -M &lt;mi_email&gt;@fing.edu.uy

# Email
#PBS -m abe
# n: no mail will be sent.
# a: mail is sent when the job is aborted by the batch system.
# b: mail is sent when the job begins execution.
# e: mail is sent when the job terminates.

# Directorio donde se guardará la salida estándar y de error de nuestro trabajo
#PBS -e &lt;ruta_absoluta_al_directorio_trabajo&gt;/
#PBS -o &lt;ruta_absoluta_al_directorio_trabajo&gt;/

<!-- SE QUITA ESTA LINEA PORQUE GENERA ERRORES EN ROCKS CLUSTER
# Will make  all variables defined in the environment from which the job is submitted available to the job.
#PBS -V
-->
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
<!--export OMP_SCHEDULE="DYNAMIC,1"
export OMP_NUM_THREADS=$NPROCS-->
time /&lt;Ruta absoluta al ejecutable de nuestro trabajo&gt;</pre>

<h2>Trabajo distribuido<a name='Distribuido' id='Distribuido'></a></h2>

<!--<p>Antes de compilar y ejecutar un programa que utilice una
implementación de MPI es necesario configurar el entorno de nuestro
usuario del cluster y especificar qué implementación de MPI se desea
utilizar. Para obtener una lista de las implementaciónes de MPI
disponibles en el cluster se debe ejecutar:</p>
<pre class='escaped'>[siturria@cluster ~]$ switcher mpi --list 
mpich-ch_p4-gcc-1.2.7
openmpi-1.2.5
lam-7.1.4</pre>
<p>Para configurar el uso de la implementación MPICH se debe ejecutar: <pre
	class='escaped'>[siturria@cluster ~]$ switcher mpi = mpich-ch_p4-gcc-1.2.7</pre></p>
<p>Finalmente podemos verificar que la configuración sea la correcta
ejecutando el siguiente comando: <pre class='escaped'>[siturria@cluster mom_logs]$ switcher mpi --user</pre></p>
<p>Una vez definida una implementación de MPI para nuestro usuario los
comandos MPI (p.ej.: mpicc, mpiCC, mpirun, etc.) quedaran definidos de
forma global en el cluster y podrémos ejecutarlos sin inconvenientes
desde cualquier nodo.</p>
<p>Es necesario cerrar la conexión de la sesión actual e iniciar una
nueva conexión con el cluster para que la nueva configuración tenga
efecto.</p>
<div></div>-->
<h3>MPI 2 <a name='DistribuidoMPICH' id='DistribuidoMPICH'></a></h3>
<p>Las dos implementaciones disponibles de MPI son:
<br /><br />
- Open MPI 1.6.2 en /opt/openmpi/ [es el que esté configurado por defecto]<br />
- MPICH2 1.4.1p1 en /opt/mpich2/gnu/<br /><br />

</p>
<pre class='escaped'>#!/bin/bash

# Nombre del trabajo
#PBS -N &lt;Nombre del trabajo&gt;

# Requerimientos
# En este caso nuestro trabajo requiere: 16 procesadores, 1 hora de ejecución.
#PBS -l nodes=16,walltime=01:00:00

# Cola de ejecución
#PBS -q small_jobs

# Directorio de trabajo
#PBS -d &lt;ruta_absoluta_al_directorio_trabajo&gt;

# Correo electronico
#PBS -M &lt;mi_email&gt;@fing.edu.uy

# Email
#PBS -m abe
# n: no mail will be sent.
# a: mail is sent when the job is aborted by the batch system.
# b: mail is sent when the job begins execution.
# e: mail is sent when the job terminates.

# Directorio donde se guardará la salida estándar y de error de nuestro trabajo
#PBS -e &lt;ruta_absoluta_al_directorio_trabajo&gt;/
#PBS -o &lt;ruta_absoluta_al_directorio_trabajo&gt;/

<!-- SE QUITA ESTA LINEA PORQUE GENERA ERRORES EN ROCKS CLUSTER
# Will make  all variables defined in the environment from which the job is submitted available to the job.
#PBS -V
-->
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
time /opt/mpiexec/bin/mpiexec /&lt;Ruta absoluta al ejecutable de nuestro trabajo&gt; </pre>
<!--
<h3>LAM/MPI<a name='DistribuidoLAM' id='DistribuidoLAM'></a></h3>
<pre class='escaped'>#!/bin/bash

# Nombre del trabajo
#PBS -N &lt;Nombre del trabajo&gt;

# Requerimientos
# En este caso nuestro trabajo requiere: 16 procesadores, 1 hora de ejecución.
#PBS -l nodes=16,walltime=01:00:00

# Cola de ejecución
#PBS -q small_jobs

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

export LD_LIBRARY_PATH=/opt/lam-7.1.4/lib
export PATH=/opt/lam-7.1.4/bin:$PATH

/opt/lam-7.1.4/bin/lamboot
/opt/lam-7.1.4/bin/mpiexec ./&lt;Ejecutable de nuestro trabajo&gt;
/opt/lam-7.1.4/bin/lamhalt</pre>
-->
</div>
</div>
<h2>Iniciar un trabajo<a name='Iniciar' id='Iniciar'></a></h2>
Una vez finalizado el script que describe a nuestro trabajo debemos indicarle al gestor que deseamos iniciar el trabajo en el cluster.
Para solicitar la ejecución de un trabajo en el cluster debemos invocar el comando <i>qsub</i> utilizando como argumento el script que acabamos 
de crear y que describe nuestro trabajo:
<pre class='escaped'>
$ qsub script_gestor.sh
</pre>
Es probable que un trabajo no inicie inmediatamente su ejecución en el cluster. El gestor debe buscar los recursos necesarios para iniciar la ejecución
del nuevo trabajo y es probable que estos recursos actualmente esten siendo utilizados por otro trabajo. Para obtener más información sobre el estado 
de un trabajo en el cluster ver <a href="<?php echo base_url();?>index.php/comandos_uso_cotidiano">comandos de uso cotidiano</a>.
<h2>Iniciar un trabajo que depende de otro trabajo<a name='IniciarConDependencia' id='IniciarConDependencia'></a></h2>
Para iniciar un trabajo que depende de otro trabajo debemos utilizar la opción <b><i>qsub -W depend</i></b> seguido por el tipo de dependencia.<br/>Por ejemplo, supongamos que el trabajo <b><i>paso_1.sh</i></b> esta siendo ejecutado en el cluster con tiene ID <b><i>3251714.cluster</i></b>, y queremos que el trabajo <b><i>paso_2.sh</i></b> sea ejecutado una vez que finaliza el trabajo <b><i>paso_1.sh</i></b>. Entonces debemos iniciar el trabajo <b><i>paso_2.sh</i></b> de la siguiente manera:  
<pre class='escaped'>
$ qsub -W depend=after:3251714.cluster paso_2.qsub
</pre>
En este caso el trabajo <b><i>paso_2.sh</i></b> se ejecutará después del trabajo <b><i>paso_1.sh</i></b> sin importar si este finaliza correctamente o erroneamente. Si queremos que se ejecute <b>solamente</b> si el trabajo finaliza correctamente, debemos ejecutar:
<pre class='escaped'>
$ qsub -W depend=afterok:3251714.cluster paso_2.qsub
</pre> 
Aqui se puede consultar una lista de todos las posibles dependencias con las que puede iniciarse un trabajo <a href="http://cf.ccmr.cornell.edu/cgi-bin/w3mman2html.cgi?qsub%281B%29">enlace</a>.
