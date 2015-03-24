<div id="content">
<h1>Comandos de uso cotidiano</h1>
<div id="content-body">
<div>
<ul>
	<li><a href='#IniciarTrabajo'>Iniciar un trabajo en el cluster</a></li>
	<li><a href='#ModificarTrabajo'>Modificar atributos de un trabajo</a></li>
	<li><a href='#RerunTrabajos'>Volver a correr uno o varios trabajos</a></li>
	<li><a href='#ListarTrabajos'>Listar trabajos en el cluster</a></li>
	<li><a href='#CuandoComienzaTrabajo'>Conocer un estimativo de cuando va a comenzar un trabajo</a></li>
	<li><a href='#EliminarTrabajo'>Eliminar un trabajo del cluster</a></li>
	<li><a href='#DetalleTrabajo'>Detalle de un trabajo</a></li>
	<li><a href='#EstadoNodos'>Estado de los nodos</a></li>
	<li><a href='#DiagnosticoTrabajo'>Diagnosticar problemas con un trabajo</a>
	</li>
	<li><a href='#RecursosDisponibles'>Mostrar recursos disponibles</a>
        </li>
	<li><a href='comandos_administrador'>Comandos Administrador</a></li>
</ul>
<div>
<div style="align: right;">
</div>
<h2>Iniciar un trabajo en el cluster<a name='IniciarTrabajo'
	id='IniciarTrabajo'></a></h2>
<p>Para iniciar un trabajo se debe utilizar el comando <em>qsub</em>
(Queue SUBmit).</p>
<pre class='escaped'>
$ qsub trabajo.sh
513.cluster.fing.edu.uy
</pre>

<h2>Modificar atributos de un trabajo<a name='ModificarTrabajo' id='ModificarTrabajo'></a></h2>
<p>Para modificar los atributos de un trabajo se utiliza el comando <em>qalter</em>.
Si bien se pueden modificar mientras el trabajo está corriendo, los cambios no aplican hasta que se vuelve a correr el mismo trabajo con el comando <em>qrerun</em>.</p>

<pre class='escaped'>
Synopsis

qalter [-a date_time][-A account_string][-c interval][-e path_name]
       [-h hold_list][-j join_list][-k keep_list][-l resource_list]
       [-m mail_options][-M mail_list][-n][-N name][-o path_name]
       [-p priority][-q ][-r y|n][-S path_name_list][-u user_list]
       [-v variable_list][-W additional_attributes]
       [-t array_range]
       job_identifier ...

Description

The qalter command modifies the attributes of the job or jobs specified by
 job_identifier on the command line. Only those attributes listed as options 
on the command will be modified. If any of the specified attributes cannot 
be modified for a job for any reason, none of that job's attributes will be modified.

The qalter command accomplishes the modifications by sending a Modify Job
 batch request to the batch server which owns each job.
</pre>

<h2>Volver a correr uno o varios trabajos<a name='RerunTrabajos'
        id='RerunTrabajos'></a></h2>
<p>Es posible volver a correr un trabajo que ya fue iniciado anteriormente, con el comando <em>qrerun </em>.</p>
<pre class='escaped'>
Synopsis

qrerun [{-f}] <JOBID>[ <JOBID>] ...

Description
The qrerun command directs that the specified jobs are to be rerun 
if possible.  To rerun a job is to terminate the session leader of the 
job and return the job to the queued state in the execution queue in 
which the job currently resides.

If a job is marked as not rerunable then the rerun request will fail 
for that job.  If the mini-server running the job is down, or it rejects 
the request, the Rerun Job batch request will return a failure unless -f is used.

Using -f violates IEEE Batch Processing Services Standard and should be 
handled with great care.  It should only be used under exceptional circumstances.  
The best practice is to fix the problem mini-server host and let qrerun run 
normally.  The nodes may need manual cleaning.  See the -r option on the qsub 
and qalter commands.
</pre>

<p>Por ejemplo si queremos volver a correr el trabajo con identificador 15406:</p>

<pre class='escaped'>$qrerun -f 15406</pre>

<h2>Listar trabajos en el cluster<a name='ListarTrabajos'
id='ListarTrabajos'></a></h2>
<p>Puede obtenerse un listado de todos los trabajos del sistema
utilizando el comando <em>showq</em>.</p>
<pre class='escaped'>
showq (Show Queue) 
Synopsis
showq [-b] [-g] [-l] [-c|-i|-r] [-p partition] [-R rsvid] [-v] [-w &lt;CONSTRAINT&gt;]

Overview
Displays information about active, eligible, blocked, and/or recently
completed jobs. Since the resource manager is not actually scheduling
jobs, the job ordering it displays is not valid. The showq command
displays the actual job ordering under the Moab Workload Manager. When
used without flags, this command displays all jobs in active, idle,
and non-queued states.
</pre> <pre class='escaped'>
$ showq
ACTIVE JOBS--------------------
JOBNAME            USERNAME      STATE  PROC   REMAINING            STARTTIME

510                  gusera    Running     1  4:10:53:02  Sat Jun 12 15:57:19
506                  gusera    Running     8 11:18:43:38  Sat Jun  5 09:47:55
507                  gusera    Running     8 17:16:50:00  Mon Jun  7 03:54:17

     3 Active Jobs      17 of  150 Processors Active (11.33%)
                         3 of   16 Nodes Active      (18.75%)

IDLE JOBS----------------------
JOBNAME            USERNAME      STATE  PROC     WCLIMIT            QUEUETIME


0 Idle Jobs

BLOCKED JOBS----------------
JOBNAME            USERNAME      STATE  PROC     WCLIMIT            QUEUETIME


Total Jobs: 3   Active Jobs: 3   Idle Jobs: 0   Blocked Jobs: 0
</pre>
<p>Si se desea obtener solamente los trabajos del usuario siturria se
puede utilizar el argumento <em>-u</em>:</p>
<pre class='escaped'>
$ showq -u siturria
</pre>
<p>Si se desea obtener un listado con los totales de trabajos por cada
cola de ejecución se debe ejecutar el siguiente comando:</p>
<pre class='escaped'>
$ qstat -q

server: pbs_oscar

Queue            Memory CPU Time Walltime Node  Run Que Lm  State
---------------- ------ -------- -------- ----  --- --- --  -----
publica            --      --       --      --    3   0 --   E R
privada            --      --       --      --    0   0 --   E R
especial           --      --       --      --    0   0 --   E R
                                               ----- -----
                                                   3     0
</pre>

<h2>Conocer un estimativo de cuando va a comenzar un trabajo<a name='CuandoComienzaTrabajo'></a></h2>
<p>Para saberlo tenemos disponible el comando <em>showstart</em></p>

<pre class='escaped'>
Overview
This command displays the estimated start time of a job based a number of 
analysis types. This analysis may include information based on historical 
usage, earliest available reservable resources, and priority based backlog 
analysis. Each type of analysis will provide somewhat different estimates 
base on current cluster environmental conditions. By default, only reservation 
based analysis is performed. 
</pre>

<p>El siguiente es un ejemplo del funcionamiento del comando</p>

<pre class='escaped'>
$ showstart orion.13762

job orion.13762 requires 2 procs for 0:33:20

Estimated Rsv based start in                 1:04:55 on Fri Jul 15 12:53:40
Estimated Rsv based completion in            2:44:55 on Fri Jul 15 14:33:40

Estimated Priority based start in            5:14:55 on Fri Jul 15 17:03:40
Estimated Priority based completion in       6:54:55 on Fri Jul 15 18:43:40

Estimated Historical based start in         00:00:00 on Fri Jul 15 11:48:45
Estimated Historical based completion in     1:40:00 on Fri Jul 15 13:28:45

Best Partition: fast
</pre>

<h2>Eliminar un trabajo del cluster<a name='EliminarTrabajo'
	id='EliminarTrabajo'></a></h2>
<pre class='escaped'>
$ qdel 285.cluster</pre>
<h2>Detalle de un trabajo<a name='DetalleTrabajo' id='DetalleTrabajo'></a></h2>
<p>Para obtener información de un trabajo que aún se encuentra en el
sistema pueden utilizarse los comandos <em>checkjob</em> o <em>qstat -f</em>.
El comando <em>checkjob</em> se debe utilizar se la siguiente forma.</p>
<pre class='escaped'>
checkjob (Check Job) 

Synopsis
checkjob [-A] [-l policylevel] [-n nodeid] [-q qosid] [-r reservationid] [-v] [--flags=future] jobid 

Overview
checkjob displays detailed job state information and diagnostic output
for a specified job.  Detailed information is available for queued,
blocked, active, and recently completed jobs.
</pre> <pre class='escaped'>
$ checkjob -v 507

checking job 507

State: Running
Creds:  user:gusera  group:clusterusers  class:publica  qos:DEFAULT
WallTime: 7:07:38:28 of 25:00:00:00
SubmitTime: Sun Jun  6 21:22:16
  (Time Queued  Total: 6:32:01  Eligible: 6:32:01)

StartTime: Mon Jun  7 03:54:17
Total Tasks: 8

Req[0]  TaskCount: 8  Partition: DEFAULT
Network: [NONE]  Memory &gt;= 0  Disk &gt;= 0  Swap &gt;= 0
Opsys: [NONE]  Arch: [NONE]  Features: [cpu]
NodeCount: 1
Allocated Nodes:
[node08.cluster.fing:8]

IWD: [NONE]  Executable:  [NONE]
Bypass: 0  StartCount: 1
PartitionMask: [ALL]
Flags:       HOSTLIST RESTARTABLE
HostList:
  [node08.cluster.fing:8]
Reservation '507' (-7:07:38:45 -&gt; 17:16:21:15  Duration: 25:00:00:00)
PE:  8.00  StartPriority:  18
</pre>
<p>También puede utilizarse el comando comando <em>qstat -f</em> de la
siguiente forma:</p>
<pre class='escaped'>
$ qstat -f 507.cluster
Job Id: 507.cluster.fing.edu.uy
    Job_Name = pi6b22
    Job_Owner = gusera@node01.cluster.fing
    resources_used.cput = 973:29:15
    resources_used.mem = 3145896kb
    resources_used.vmem = 3550392kb
    resources_used.walltime = 175:32:12
    job_state = R
    queue = publica
    server = cluster.fing.edu.uy
    Checkpoint = u
    ctime = Sun Jun  6 21:22:15 2010
    Error_Path = cluster.fing.edu.uy:/home/gusera/caffa3d/test2009/pi6b01/
    exec_host = node08.cluster.fing/7+node08.cluster.fing/6+node08.cluster.fin
        g/5+node08.cluster.fing/4+node08.cluster.fing/3+node08.cluster.fing/2+
        node08.cluster.fing/1+node08.cluster.fing/0
    Hold_Types = n
    Join_Path = n
    Keep_Files = n
    Mail_Points = n
    mtime = Mon Jun  7 03:54:18 2010
    Output_Path = cluster.fing.edu.uy:/home/gusera/caffa3d/test2009/pi6b01/
    Priority = 0
    qtime = Sun Jun  6 21:22:16 2010
    Rerunable = True
    Resource_List.nodect = 1
    Resource_List.nodes = node08.cluster.fing:ppn=8
    Resource_List.walltime = 600:00:00
    session_id = 2606
    etime = Sun Jun  6 21:22:16 2010

</pre>
<h2>Estado de los nodos<a name='EstadoNodos' id='EstadoNodos'></a></h2>
<p>Si se desea obtener un listado de todos los nodos del sistema puede
utilizarse el comando "pbsnodes -a''.</p>
<pre class='escaped'>
$ pbsnodes -a
node02.cluster.fing
     state = free
     np = 8
     properties = all,cpu,cpu8,ram8
     ntype = cluster
     status = opsys=linux,uname=Linux node02.cluster.fing 2.6.18-92.1.22.el5 #1 SMP Tue Dec 16 11:57:43 EST 2008 x86_64,sessions=5589 8172 9653,nsessions=3,nusers=1,idletime=3360431,totmem=8674200kb,availmem=7173404kb,physmem=8174212kb,ncpus=8,loadave=0.00,netload=3024808416483,state=free,jobs=? 0,rectime=1276526639

node03.cluster.fing
     state = free
     np = 8
     properties = all,cpu,cpu8,ram8
     ntype = cluster
     status = opsys=linux,uname=Linux node03.cluster.fing 2.6.18-92.1.22.el5 #1 SMP Tue Dec 16 11:57:43 EST 2008 x86_64,sessions=11828 17418 30839 32489,nsessions=4,nusers=1,idletime=3953831,totmem=8674200kb,availmem=8433564kb,physmem=8174212kb,ncpus=8,loadave=0.00,netload=168698182195,state=free,jobs=? 0,rectime=1276526640

...
</pre>
<p>Para obtener un listado de los nodos con recursos disponibles
(ociosos) se debe utilizar el comando <em>showbf -S</em>.</p>
<pre class='escaped'>
showbf (Show Available Resources) 

Synopsis
showbf [-A] [-a account] [-c class] [-d duration] [-D] [-f features] [-g group] [-L] 
       [-m [==|&gt;|&gt;=|&lt;|&lt;=] memory] [-n nodecount] [-p partition] [-q qos] [-u user] [-v]

Overview
Shows what resources are available for immediate use.  This command
can be used by any user to find out how many processors are available
for immediate use on the system. It is anticipated that users will use
this information to submit jobs that meet these criteria and thus
obtain quick job turnaround times. This command incorporates down
time, reservations, and node state information in determining the
available backfill window. 
</pre> <pre class='escaped'>
$ showbf -S
            HostName Procs Memory    Disk    Swap   Time Available
          ---------- ----- ------ ------- -------   --------------

 node02.cluster.fing     8   7982       1    7004         INFINITY

 node03.cluster.fing     8   7982       1    8235         INFINITY

 node04.cluster.fing     8   7982       1    8005         INFINITY

 node05.cluster.fing     8   7982       1    7237         INFINITY

 node06.cluster.fing     8   7982       1    6245         INFINITY

 node07.cluster.fing     8   7982       1    8292         INFINITY

 node09.cluster.fing     7   7982       1    6698       4:10:01:48

 node11.cluster.fing     2   2010       1    2430         INFINITY

 node14.cluster.fing     2   2010       1    2428         INFINITY

 node16.cluster.fing     2   2010       1    2424         INFINITY

 node20.cluster.fing    16  24098       1   20157         INFINITY

 node21.cluster.fing     7  24098       1   21088      11:17:52:24

 node22.cluster.fing    16  24098       1   24474         INFINITY

 node23.cluster.fing    16  24098       1   24471         INFINITY

 tesla.cluster.fing     16  48290       1   49730         INFINITY
</pre>
<h2>Diagnosticar problemas con un trabajo<a name='DiagnosticoTrabajo'
	id='DiagnosticoTrabajo'></a></h2>
<p>Utilizado para diagnosticar la situación en la que se encuentra un trabajo. Para conocer la información de los trabajos se utiliza mdiag -j. Para conocer información sobre trabajos bloqueados se utiliza mdiag -q.</p>
<pre class='escaped'>
Overview
The mdiag command is used to display information about various aspects of the cluster and the results 
of internal diagnostic tests.  In summary, it provides the following:

    current object health and state information
    current object configuration (resources, policies, attributes, etc)
    current and historical performance/utilization information
    reports on recent failure
    object messages 
</pre>
<pre class='escaped'>
$ mdiag -j
$ mdiag -q 
</pre>

<h2>Mostrar recursos disponibles<a  name='RecursosDisponibles'
        id='RecursosDisponibles' ></a></h2>
<p>Ejecutando el comando <em>showbf</em> podemos saber los recursos que están disponibles para usar inmediatamente.</p>

<pre class='escaped'>
Overview
Shows what resources are available for immediate use.

This command can be used by any user to find out how many processors are available 
for immediate use on the system. It is anticipated that users will use this 
information to submit jobs that meet these criteria and thus obtain quick job 
turnaround times. This command incorporates down time, reservations, and node 
state information in determining the available backfill window. 
</pre>

<p>Por ejemplo si queremos un trabajo que necesita 16 procesadores, que va a durar 
3 horas y que necesita 512MB de memoria ram en dichos procesadores:</p>

<pre class='escaped'>
$showbf -m ' =512'

backfill window (user: 'john' group: 'staff' partition: ALL) Thu Jun 18 16:03:04

no procs available
</pre>

</div>
</div>

