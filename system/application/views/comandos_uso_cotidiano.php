<div id="content">
<h1>Comandos de uso cotidiano</h1>
<div id="content-body">
<ul>
	<li><a href='#IniciarTrabajo'>Iniciar un trabajo en el cluster</a></li>
	<li><a href='#ListarTrabajos'>Listar trabajos en el cluster</a></li>
	<li><a href='#EliminarTrabajo'>Eliminar un trabajo del cluster</a></li>
	<li><a href='#DetalleTrabajo'>Detalle de un trabajo</a></li>
	<li><a href='#EstadoNodos'>Estado de los nodos</a></li>
	<li><a href='#DiagnosticoTrabajo'>Diagnosticar problemas con un trabajo</a>
	</li>
</ul>
<h2>Iniciar un trabajo en el cluster<a name='IniciarTrabajo'
	id='IniciarTrabajo'></a></h2>
<p>Para iniciar un trabajo se debe utilizar el comando <em>qsub</em>
(Queue SUBmit).</p>
<pre class='escaped'>
[siturria@cluster primeNumber]$ qsub trabajo.sh
513.cluster.fing.edu.uy
</pre>

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
[siturria@cluster ~]$ showq
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
[siturria@cluster ~]$ showq -u siturria
</pre>
<p>Si se desea obtener un listado con los totales de trabajos por cada
cola de ejecución se debe ejecutar el siguiente comando:</p>
<pre class='escaped'>
[siturria@cluster ~]$ qstat -q

server: pbs_oscar

Queue            Memory CPU Time Walltime Node  Run Que Lm  State
---------------- ------ -------- -------- ----  --- --- --  -----
publica            --      --       --      --    3   0 --   E R
privada            --      --       --      --    0   0 --   E R
especial           --      --       --      --    0   0 --   E R
                                               ----- -----
                                                   3     0
</pre>
<h2>Eliminar un trabajo del cluster<a name='EliminarTrabajo'
	id='EliminarTrabajo'></a></h2>
<pre class='escaped'>
[siturria@cluster ~]$ qdel 285.cluster</pre>
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
[siturria@cluster ~]$ checkjob -v 507

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
[siturria@cluster ~]$ qstat -f 507.cluster
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
[siturria@cluster ~]$ pbsnodes -a
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
[siturria@cluster ~]$ showbf -S
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
<pre class='escaped'>
[siturria@cluster primeNumber]$ diagnose -j
[siturria@cluster primeNumber]$ diagnose -q 
</pre>
</div>
</div>

