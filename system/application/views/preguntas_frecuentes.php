	<div id="content-wrapper">
		<div id="content-container">
			<div id="content">

				<!--PageTitleFmt-->
				<h1>Preguntas frecuentes</h1>
				<!--/PageTitleFmt-->

				<!--PageText-->
<div>
<ul><li><a href='#ParametrizarTrabajo'>¿Cómo puedo parametrizar la ejecución de un trabajo?</a>
</li></ul><h2>¿Cómo puedo parametrizar la ejecución de un trabajo?<a name='ParametrizarTrabajo' id='ParametrizarTrabajo'></a></h2>

<p>La forma más sencilla de parametrizar la ejecución de un trabajo es mediante la utilización de variables de entorno. Tomemos como ejemplo el siguiente script:
</p>
<pre class='escaped'>
#!/bin/bash
#PBS -N mi_trabajo
#PBS -l nodes=1,walltime=00:00:10
#PBS -q publica
#PBS -d /home/siturria
#PBS -V

cd $PBS_O_WORKDIR

time $ejecutable $arg
</pre>
<p class='vspace'>En este ejemplo el nombre del ejecutable esta dado por la variable <em>$ejecutable</em> y el ejecutable recibe un parámetro que esta dado por la variable <em>$arg</em>. El valor de estas variables pueden establecerse previo a la ejecución del trabajo, pero la manera de establecer el valor de las variables depende del shell que se esté  utilizando. Para establecer los valores de las variables <em>$ejecutable</em> y <em>$arg</em> en el shell bash y luego inciar la ejecución del trabajo se deben ejecutar los siguientes comandos:

</p>
<pre class='escaped'>
[siturria@cluster ~]$ export ejecutable="ls"
[siturria@cluster ~]$ export arg="-la"
[siturria@cluster ~]$ qsub mi_trabajo.sh
</pre>
<p class='vspace'>Es imprescindible especificar la opción "<em>#PBS -V</em>" en el script del trabajo, de lo contrario las variables de entorno del shell desde el cual se lanza el trabajo no serán exportadas a la instancia de ejecución del trabajo.
</p>
</div>

			</div>
		</div>
	</div>

