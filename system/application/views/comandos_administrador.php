<div id="content">
<h1>Comandos más comunes con permiso de administrador</h1>
<div id="content-body">

<p>En la siguiente tabla se muestran los comandos más comunes utilizados por usuarios
con permiso de administrador:</p>
<table class='escaped'>
	<tr>
		<th>Comando</th>
		<th>Descripción</th>
	</tr>
	<tr class="bordeArriba">
		<td><a href="http://docs.adaptivecomputing.com/maui/commands/mschedctl.php">mschedctl</a></td>
		<td>Controla algunos aspectos del comportamiento del planificador.</td>
	</tr>
	<tr>
                <td></td>
                <td>-k matar el planificador</td>
        </tr>
	<tr>
                <td></td>
                <td>-l config|gres muestra los parametros del sistema y los recursos genericos</td>
        </tr>
	<tr>
                <td></td>
                <td>-m config <parameter name> <value> modificar los valores de los parámetros del sistema.</td>
        </tr>
	<tr>
                <td></td>
                <td>-n &gt; /tmp/node.trace guarda un tracefile</td>
        </tr>
	<tr>
                <td></td>
                <td>-p deshabilita el scheduler pero la información del estado de la carga del trabajo se sigue actualizando.</td>
        </tr>
	<tr>
                <td></td>
                <td>-R reinicia el scheduler con el entorno de ejecucion original</td>
        </tr>
	<tr class="bordeAbajo">
                <td></td>
                <td>-r saca la pausa del scheduler a la hora que se especifique o en el instante en el que se ejecuta en comando, si no se especifica ningun parámetro de tiempo.</td>
        </tr>
	<tr class="arribaYAbajo">
                <td><a href="http://docs.adaptivecomputing.com/maui/commands/checknode.php">Checknode &lt;idNodo&gt;</a></td>
                <td>Información administrativa de un nodo.</td>
        </tr>
	<tr class="arribaYAbajo">
                <td><a href="http://docs.adaptivecomputing.com/maui/commands/resetstats.php">resetstats</a></td>
                <td>Reset de las estadísticas.</td>
        </tr>
	<tr class="bordeArriba">
                <td><a href="http://docs.adaptivecomputing.com/maui/commands/schedctl.php">schedctl</a></td>
                <td>Utilizado para matar el planificador, modificar su comportamiento y crear trazas de ejecución.</td>
	<tr>	
		<td></td>
		<td>-k apagar el planificador al final de la iteración actual.</td>
	</tr>
	<tr>    
                <td></td>
		<td>-n se muestra por stdout la traza de la tabla de un nodo.</td>
	</tr>
	<tr>    
                <td></td>
		<td>-r [<RESUMETIME>] saca del estado de suspendido al planificador en <RESUMETIME> segundos o inmediatamente si no es especificado.</td>
	</tr>
	<tr>    
                <td></td>
		<td>-s [<ITERATION>] suspende el planificador en la iteración especificada o al finalizar la iteración actual en el caso que no se indique ningún valor. Si luego de [<ITERATION>] se agrega la letra I, entonces no se procesarán peticiones de usuario hasta que se llegue a dicha iteración.</td>
	</tr>
	<tr class="bordeAbajo">    
                <td></td>
		<td>-S [<ITERATION>] suspende el planificador luego de <ITERATION> iteraciones a partir de la ejecución del comando o al terminar la iteración actual si no se especifica ningún valor. Se se agrega la "I" al final no se procesas más peticiones de clientes hasta que hayan pasado la cantidad de iteraciones especificadas.</td>

        </tr>
	<tr class="bordeArriba">
                <td><a href="http://docs.adaptivecomputing.com/maui/commands/setres.php">setres</a></td>
                <td>Reservar recursos en el cluster</td>
	</tr>
	<tr>    
                <td></td>
		<td>-d [[[DD:]HH:]MM:]SS duración de la reservación</td>
	</tr>
	<tr>    
                <td></td>
		<td>-e [HH[:MM[:SS]]][_MO[/DD[/YY]]] ó +[[[DD:]HH:]MM:]SS tiempo en el que la reservación terminará.</td>
	</tr>
	<tr>    
                <td></td>
		<td>-s [HH[:MM[:SS]]][_MO[/DD[/YY]]] or +[[[DD:]HH:]MM:]SS tiempo de inicio de la reserva.</td>
	</tr>
	<tr class="bordeAbajo">    
                <td></td>
		<td>al final del comando poner lo siguiente para indicar sobre quien se hace la reserva: ALL 
or
TASKS{==|&gt;=}&lt;TASKCOUNT&gt; 
or 
&lt;HOST_REGEX&gt;</td>
		
        </tr>
	<tr class="arribaYAbajo">
                <td><a href="http://docs.adaptivecomputing.com/maui/commands/showres.php">showres</a></td>
                <td>Muestra las reservas actuales</td>
        </tr>
	<tr class="arribaYAbajo">
                <td><a href="http://docs.adaptivecomputing.com/maui/commands/showstate.php">showstate</a></td>
                <td>Muestra un resumen del estado del sistema. Muestra los trabajos activos, en dónde se encuentran ejecutando (aunque en el plnificador nuestro no lo hace bien) y también muestra warnings sobre la ejecución de los trabajos.</td>
        </tr>
	<tr class="bordeArriba">
                <td><a href="http://docs.adaptivecomputing.com/maui/commands/showstats.php">showstats</a></td>
                <td>Muestra estadísticas de uso del cluster.</td>
	</tr>
	<tr>
                <td></td>
		<td>-c  [<CLASSID>] estadísticas de clase.</td>
	</tr>
	<tr>
                <td></td>
                <td>-g [<GROUPID>] estadísticas de los grupos</td>
	</tr>
	<tr>
                <td></td>
                <td>-n [<NODEID>] estadísticas de los nodos</td>
        </tr>
	<tr class="bordeAbajo">
                <td></td>
                <td>-s estadísticas generales.</td>
        </tr>
	 <tr class="arribaYAbajo">
                <td><a href="http://docs.adaptivecomputing.com/maui/commands/showgrid.php">showgrid</a></td>
                <td>Muestra estadísticas que se pasan como parámetro.</td>
	</tr>
	<tr class="arribaYAbajo">
                <td><a href="http://docs.adaptivecomputing.com/maui/commands/showconfig.php">showconfig</a></td>
                <td>Muestra la versión actual y los valores de todos los parámetros.</td>
        </tr>

</table>
</div>
</div>
