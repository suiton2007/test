<?
	session_start();
	if(!$_SESSION['usr_logged'])
	{
		header("location: login.php");
	}
	$showrecs = 10;
	$pagerange = 10;
	if (isset($_POST["filter"])) $filter = @$_POST["filter"];
	if (!isset($filter) && isset($_SESSION["filter"])) $filter = $_SESSION["filter"];
	if (isset($_POST["campo"])) $campo = @$_POST["campo"];
	if (!isset($campo) && isset($_SESSION["campo"])) $campo = $_SESSION["campo"];
	
	$page = $_GET["page"];
	if (!isset($page)) $page = 1;
	
	$a = @$_GET["a"];
	switch ($a) 
	{
		case "perfil":
		  editperfil();
		  break;
		case "pass":
		  changepwd();
		  break;
		case "usuarios":
		  mostrarusuarios();
		  break;
		case "clientes":
		  mostrarclientes();
		  break;
		case "viewcat":
		  vercatalogo();
		  break;		
		case "editcat":
		  editarcatalogo();
		  break;
		case "rst":
		  resetpwd();
		  break;
		case "del":
		  deleterec();
		  break;		  
		default:
		  select();
		  break;
	}	
	
function select()
{
	include("conf.php");
	include("include/mysql.class.php");
	$id = $_SESSION['usr_id'];
	?>	
	<title>Perfil de Usuario</title>
	<h1>Perfil de Usuario</h1>
	<a href="index.php">Regresar</a>-<a href="usuarios.php?a=perfil">Cambiar Perfil</a>-<a href="usuarios.php?a=pass">Cambiar Contraseña</a>
	<?
	$db=new mysql($db_host,$db_name,$db_user,$db_password);
	$db->connect();
	$qsql="select * from usuarios where id_usuario='$id'";
	$db->query($qsql);
	?>
	<table width="400" border="1">
		<?
		if($db->num_rows()>0)
		{
			while($row=$db->fetch_assoc())
			{
				?>

				<tr>
					<td><b>Nombre</b></td>
					<td><?echo $row['nombre']?></td>
				</tr>
				<tr>
					<td><b>A. Paterno</b></td>
					<td><?echo $row['a_paterno']?></td>
				</tr>
				<tr>
					<td><b>A. Materno</b></td>
					<td><?echo $row['a_materno']?></td>
				</tr>
				<tr>
					<td><b>Direccion</b></td>
					<td><?echo $row['direccion']?></td>
				</tr>
				<tr>
					<td><b>Ciudad</b></td>
					<td><?echo $row['ciudad']?></td>
				</tr>
				<tr>
					<td><b>Estado</b></td>
					<td><?echo $row['estado']?></td>
				</tr>	
				<tr>
					<td><b>Coigo Postal</b></td>
					<td><?echo $row['cp']?></td>
				</tr>
				<tr>
					<td><b>Telefono 1</b></td>
					<td><?echo $row['telefono']?></td>
				</tr>
				<tr>
					<td><b>Telefono 2</b></td>
					<td><?echo $row['telefono2']?></td>
				</tr>
				<tr>
					<td><b>Correo Electronico</b></td>
					<td><?echo $row['email']?></td>
				</tr>						
				<tr>
					<td><b>Correo Alternativo</b></td>
					<td><?echo $row['email2']?></td>
				</tr>
				<?
				if($t_usuario==2)
				{
				?>
				<tr>
					<td colspan=2><div align="center"><font  face="Verdana, Arial, Helvetica, sans-serif" size="2"><b>Datos de Facturacion</b></font></div></td>
					
				</tr>
				<tr>
					<td><b>Direccion</b></td>
					<td><?echo $row['direccion_fact']?></td>
				</tr>
				<tr>
					<td><b>Ciudad</b></td>
					<td><?echo $row['ciudad_fact']?></td>
				</tr>
				<tr>
					<td><b>Estado</b></td>
					<td><?echo $row['estado_fact']?></td>
				</tr>	
				<tr>
					<td><b>Coigo Postal</b></td>
					<td><?echo $row['cp_fact']?></td>
				</tr>
				<tr>
					<td><b>RFC</b></td>
					<td><?echo $row['rfc']?></td>
				</tr>
				<?
				}
			}
			
		}
}
function editperfil()
{
	include("conf.php");
	include("include/mysql.class.php");
	$id = $_SESSION['usr_id'];
	$db=new mysql($db_host,$db_name,$db_user,$db_password);
	$db->connect();
	$qsql="select * from usuarios where id_usuario='$id'";
	$db->query($qsql);
	if($db->num_rows()>0)
	{
		while($row=$db->fetch_assoc())
		{
			$nombre=$row['nombre'];
			$a_paterno=$row['a_paterno'];
			$a_materno=$row['a_materno'];
			$rfc=$row['rfc'];
			$direccion=$row['direccion'];
			$ciudad=$row['ciudad'];
			$estado=$row['estado'];
			$cp=$row['cp'];
			$direccion_fact=$row['direccion_fact'];
			$ciudad_fact=$row['ciudad_fact'];
			$estado_fact=$row['estado_fact'];
			$cp_fact=$row['cp_fact'];			
			$telefono=$row['telefono'];
			$telefono2=$row['telefono2'];
			$email=$row['email'];
			$email2=$row['email2'];
		}
	}
	?>
	<title>Edicion de Perfiles de Usuario</title>
	<h1>Edicion de Perfiles de Usuario</h1><hr>
	<form method="post" action="usuarios.php">
		<table width="200" border="0"                                                                                                                                                                                                            >	 
			<input name="id_usuario" type="hidden" size="33" maxlength="84" value="<?echo $id?>" />		 
		 <tr>
			<td><div align="right"><font  face="Verdana, Arial, Helvetica, sans-serif" size="2">Nombre</font></div></td>
			<td><input name="nombre" type="text" size="33" maxlength="84" value="<?echo $nombre?>" /></td>
		  </tr>
		  <tr>
			<td><div align="right"><font  face="Verdana, Arial, Helvetica, sans-serif" size="2">Apellido Paterno</font></div></td>
			<td><input name="apaterno" type="text" size="33" maxlength="84" value="<?echo $a_paterno?>" /></td>
		  </tr>
		  <tr>
			<td><div align="right"><font  face="Verdana, Arial, Helvetica, sans-serif" size="2">Apellido Materno</font></div></td>
			<td><input name="amaterno" type="text" size="33" maxlength="84" value="<?echo $a_materno?>" /></td>
		  </tr>		
		  <tr>
			<td><div align="right"><font  face="Verdana, Arial, Helvetica, sans-serif" size="2">Direccion</font></div></td>
			<td><textarea name="direccion" id="direccion" cols="25" rows="3" ><?echo $direccion?></textarea></td>
		  </tr>
		  <tr>
			<td><div align="right"><font  face="Verdana, Arial, Helvetica, sans-serif" size="2">Ciudad</font></div></td>
			<td><input name="ciudad" type="text" size="33" maxlength="84" value="<?echo $ciudad?>" /></td>
		  </tr>	
		  <tr>
			<td><div align="right"><font  face="Verdana, Arial, Helvetica, sans-serif" size="2">Estado</font></div></td>
			<td>
				<select name="estado" style="width:225px">
					<OPTGROUP LABEL="Seleccione un Estado" selected>
					<option value="Aguascalientes"<?if($estado=="Aguascalientes"){echo "SELECTED";}?>>Aguascalientes</option>
					<option value="Baja California"<?if($estado=="Baja California"){echo "SELECTED";}?>>Baja California</option>
					<option value="Baja California Sur"<?if($estado=="Baja California Sur"){echo "SELECTED";}?>>Baja California Sur</option>
					<option value="Campeche"<?if($estado=="Campeche"){echo "SELECTED";}?>>Campeche</option>
					<option value="Coahuila"<?if($estado=="Coahuila"){echo "SELECTED";}?>>Coahuila</option>
					<option value="Colima"<?if($estado=="Colima"){echo "SELECTED";}?>>Colima</option>
					<option value="Chiapas"<?if($estado=="Chiapas"){echo "SELECTED";}?>>Chiapas</option>
					<option value="Chihuahua"<?if($estado=="Chihuahua"){echo "SELECTED";}?>>Chihuahua</option>
					<option value="Distrito Federal"<?if($estado=="Distrito Federal"){echo "SELECTED";}?>>Distrito Federal</option>
					<option value="Durango"<?if($estado=="Durango"){echo "SELECTED";}?>>Durango</option>
					<option value="Estado de México"<?if($estado=="Estado de México"){echo "SELECTED";}?>>Estado de México</option>
					<option value="Guanajuato"<?if($estado=="Guanajuato"){echo "SELECTED";}?>>Guanajuato</option>
					<option value="Guerrero"<?if($estado=="Guerrero"){echo "SELECTED";}?>>Guerrero</option>
					<option value="Hidalgo"<?if($estado=="Hidalgo"){echo "SELECTED";}?>>Hidalgo</option>
					<option value="Jalisco"<?if($estado=="Jalisco"){echo "SELECTED";}?>>Jalisco</option>
					<option value="Michoacán"<?if($estado=="Michoacán"){echo "SELECTED";}?>>Michoacán</option>
					<option value="Morelos"<?if($estado=="Morelos"){echo "SELECTED";}?>>Morelos</option>
					<option value="Nayarit"<?if($estado=="Nayarit"){echo "SELECTED";}?>>Nayarit</option>
					<option value="Nuevo León"<?if($estado=="Nuevo León"){echo "SELECTED";}?>>Nuevo León</option>
					<option value="Oaxaca"<?if($estado=="Oaxaca"){echo "SELECTED";}?>>Oaxaca</option>
					<option value="Puebla"<?if($estado=="Puebla"){echo "SELECTED";}?>>Puebla</option>
					<option value="Querétaro"<?if($estado=="Querétaro"){echo "SELECTED";}?>>Querétaro</option>
					<option value="Quintana Roo"<?if($estado=="Quintana Roo"){echo "SELECTED";}?>>Quintana Roo</option>
					<option value="San Luis Potosí"<?if($estado=="San Luis Potosí"){echo "SELECTED";}?>>San Luis Potosí</option>
					<option value="Sinaloa"<?if($estado=="Sinaloa"){echo "SELECTED";}?>>Sinaloa</option>
					<option value="Sonora"<?if($estado=="Sonora"){echo "SELECTED";}?>>Sonora</option>
					<option value="Tabasco"<?if($estado=="Tabasco"){echo "SELECTED";}?>>Tabasco</option>
					<option value="Tamaulipas"<?if($estado=="Tamaulipas"){echo "SELECTED";}?>>Tamaulipas</option>
					<option value="Tlaxcala"<?if($estado=="Tlaxcala"){echo "SELECTED";}?>>Tlaxcala</option>
					<option value="Veracruz"<?if($estado=="Veracruz"){echo "SELECTED";}?>>Veracruz</option>
					<option value="Yucatán"<?if($estado=="Yucatán"){echo "SELECTED";}?>>Yucatán</option>
					<option value="Zacatecas"<?if($estado=="Zacatecas"){echo "SELECTED";}?>>Zacatecas</option>
				</select>
			</td>
		  </tr>		
		  <tr>
			<td><div align="right"><font  face="Verdana, Arial, Helvetica, sans-serif" size="2">Codigo Postal</font></div></td>
			<td><input name="cp" type="text" size="33" maxlength="84" value="<?echo $cp?>" /></td>
		  </tr>			  
		  <tr>
			<td><div align="right"><font  face="Verdana, Arial, Helvetica, sans-serif" size="2">Correo Electronico </font></div></td>
			<td><input name="email" type="text" size="33" maxlength="84" value="<?echo $email?>" /></td>
		  </tr>	
		  <tr>
			<td><div align="right"><font  face="Verdana, Arial, Helvetica, sans-serif" size="2">Correo Alternativo </font></div></td>
			<td><input name="email2" type="text" size="33" maxlength="84" value="<?echo $email2?>" /></td>		
		  </tr>	
		  <tr>
			<td><div align="right"><font  face="Verdana, Arial, Helvetica, sans-serif" size="2">Telefono 1</font></div></td>
			<td><input name="telefono" type="text" size="33" maxlength="84" value="<?echo $telefono?>" /></td>
		  </tr>	
		  <tr>
			<td><div align="right"><font  face="Verdana, Arial, Helvetica, sans-serif" size="2">Telefono 2</font></div></td>
			<td><input name="telefono2" type="text" size="33" maxlength="84" value="<?echo $telefono2?>" /></td>		
		  </tr>	

		  
		  <tr>
			<td><div align="right"><input name="save" type="submit" value="Grabar" /></div></td>
			<td><div align="left"><input type="button" name="cancel" value="Cancelar" onclick="javascript:window.location.href='usuarios.php'"></div></td>		
		  </tr>
		</table>
	</form>
<?
}
function changepwd()
{
	include("conf.php");
	include("include/mysql.class.php");
	$id = $_SESSION['usr_id'];
	$db=new mysql($db_host,$db_name,$db_user,$db_password);
	$db->connect();
	$qsql="select pwd from usuarios where id_usuario='$id'";
	$db->query($qsql);
	if($db->num_rows()>0)
	{
		while($row=$db->fetch_assoc())
		{
			$pass=$row['pwd'];

		}
	}	
	
?>
	<h1>Cambio de Contraseña</h1>
	<title>Cambio de Contraseña</title>
	<form method="post" action="usuarios.php" name="pass">

		<table width="200" border="0"                                                                                                                                                                                                            >

		  <tr>
			<input name="val" type="hidden"  size="33" maxlength="30" value="<?echo $pass?>" />
			<td><div align="right"><font  face="Verdana, Arial, Helvetica, sans-serif" size="2">contraseña anterior</font></div></td>
			<td><input name="pwdanterior" type="password" size="33" maxlength="30" value="" onblur="javascript:validaranterior()"/></td>
		  </tr>	
		  <tr>
			<td><div align="right"><font  face="Verdana, Arial, Helvetica, sans-serif" size="2">contraseña nueva</font></div></td>
			<td><input name="pwdnuevo" type="password" size="33" maxlength="30" value="" /></td>
		  </tr>	
		  <tr>
			<td><div align="right"><font  face="Verdana, Arial, Helvetica, sans-serif" size="2">verificar contraseña</font></div></td>
			<td><input name="pwdverificar" type="password" size="33" maxlength="30" value="" onblur="javascript:validarnuevo()" /></td>
		  </tr>			  
		  <tr>
			<td><div align="right"><input type="submit" name="savepwd"  value="Grabar" /></div></td>
			<td><div align="left"><input type="button" name="cancel" value="Cancelar" onclick="javascript:window.location.href='usuarios.php'"></div></td>		
		  </tr>
		</table>
	</form>
	<script lenguaje="javascript">
	//document.pass.savepwd.disabled=true;
	function validaranterior()
	{
		
		if(document.pass.val.value==document.pass.pwdanterior.value)
		{
			pwdanterior=true;
		}
		else
		{
			alert("Verifique que su contraseña actual este correcta");
			//document.pass.pwdanterior.focus();
			pwdanterior=false;
		}
	}
	function validarnuevo()
	{
		if(document.pass.pwdnuevo.value==document.pass.pwdverificar.value)
		{
			pwdnuevo=true;
		}
		else
		{
			alert("La contraseña no corresponde");
			document.pass.pwdnuevo.focus();
		}	
	}

	</script>
<?
}	
function mostrarclientes()
{
	global $filter;
	global $campo;
	global $cadena;
	$quitar = @$_GET["b"];
	
	if (isset($_POST["filter"])) $filter = @$_POST["filter"];
	if (!isset($filter) && isset($_SESSION["filter"])) $filter = $_SESSION["filter"];
	if (isset($_POST["campo"])) $campo = @$_POST["campo"];
	if (!isset($campo) && isset($_SESSION["campo"])) $campo = $_SESSION["campo"];
	if($quitar=="reset"){$filter=""; $campo="";}
	?>
	<h1>Catalogo de Clientes</h1>
	<title>Catalogo de Clientes</title>

	<a href="index.php">Regresar</a>
	<a href="registrar.php">Agregar Cliente</a>
	<hr>
	<form method="post" action="usuarios.php?a=clientes">
		Filtro <input name="filter" type="text" size="23" maxlength="84" value="<?echo $filter?>" />
		<select name="campo">
			<option value="nombre"<?if($campo=="nombre"){echo "SELECTED";}?>>Nombre</option>
			<option value="a_paterno"<?if($campo=="a_paterno"){echo "SELECTED";}?>>Ap. Paterno</option>
			<option value="a_materno"<?if($campo=="a_materno"){echo "SELECTED";}?>>Ap. Materno</option>
			<option value="ciudad"<?if($campo=="ciudad"){echo "SELECTED";}?>>Ciudad</option>
			<option value="login"<?if($campo=="login"){echo "SELECTED";}?>>Usuario</option>
		</select>
		<input name="filtro" type="submit" value="Aplicar Filtro" />
		<a href="usuarios.php?a=clientes&b=reset">Quitar Filtro</a>
	</form>
	<?
	if(!$filter==""){$cadena="AND $campo like '%$filter%'";}
	else{$cadena="";}
	include("conf.php");
	include("include/mysql.class.php");

	$db=new mysql($db_host,$db_name,$db_user,$db_password);
	$db->connect();

	$max_rows=25;
	$page = (isset($_GET['page'])) ? $_GET['page'] : 1;
	$from = (($page * $max_rows) - $max_rows);  

	//$user_id=$_SESSION['usr_id'];

	$qsql="select * from usuarios where id_tipo_usuario=2 $cadena ORDER BY nombre ASC limit $from,$max_rows";

	$db->query($qsql);
	?>
	<table width="1000" border="1">
	<tr>
		<td><b>NOMBRE</b></td>
		<td><b>RFC</b></td>
		<td><b>CORREO E</b></td>
		<td><b>CORREO A</b></td>
		<td><b>LOGIN</b></td>

	</tr>
	<?
	
	if($db->num_rows()>0)
	{
		while($row=$db->fetch_assoc())
		{
			if($row['nombre']=='-'){$nombre="";}else{$nombre=$row['nombre'];}
			if($row['a_paterno']=='-'){$a_paterno="";}else{$a_paterno=$row['a_paterno'];}
			if($row['a_materno']=='-'){$a_materno="";}else{$a_materno=$row['a_materno'];}
			$nombrecompleto=$nombre." ".$a_paterno." ".$a_materno;
		?>
		<tr>
			<td><?echo $nombrecompleto?></td>
			<td><?echo $row['rfc']?></td>
			<td><?echo $row['email']?></td>
			<td><?echo $row['email2']?></td>
			<td><?echo $row['login']?></td>
			<td><a href="usuarios.php?a=viewcat&id=<?echo $row['id_usuario']?>">Ver</a></td>
			<td><a href="usuarios.php?a=editcat&id=<?echo $row['id_usuario']?>">Editar</a></td>
			<td><a href="usuarios.php?a=del&id=<?echo $row['id_usuario']?>">Eliminar</a></td>
			<td><a href="usuarios.php?a=rst&id=<?echo $row['id_usuario']?>">Restablecer Contraseña</a></td>
		</tr>
		<?
		}
	}
	?></table><?
	$db->query("select count(*) from usuarios where id_tipo_usuario=2 $cadena");
	$row=$db->fetch_row();
	$total_rows=$row[0];
	$total_pages = ceil($total_rows / $max_rows); 

	$paginaactual="usuarios.php?a=usuarios?";
	//previous
	if ($page > 1) {
	$prev = $page - 1;
	$url = $paginaactual."page=$prev";
	//$url = "pagos.php?a=pend&page=$prev";
	echo "<a href=\"$url\">Anterior</a> ";
	}

	//numbers
	for($i = 1; $i <= $total_pages; $i++){
		if(($page) == $i){
			echo "$i ";
		} else {
			echo "<a href=\"".$paginaactual."page=$i\">$i</a> ";
			//echo "<a href=\"pagos.php?a=pend&page=$i\">$i</a> ";
			}
	} 

	//next'
	if ($page < $total_pages) {
	$next = $page + 1;
	$url = $paginaactual."page=$next";
	//$url = "pagos.php?a=pend&page=$next";
	echo "<a href=\"$url\">Siguiente</a>";
	}		
}
function vercatalogo()
{
	include("conf.php");
	include("functions.php");
	include("include/mysql.class.php");
	//$id = $_SESSION['usr_id'];
	$id_usuario = @$_GET["id"];
	$t_usuario=tipo_usuario($id_usuario);
	
	?>	
	<title>Perfil de Usuario</title>
	<h1>Perfil de Usuario</h1>
	<?
	if($t_usuario==1)
	{?><a href="usuarios.php?a=usuarios">Regresar</a><?}
	else{?><a href="usuarios.php?a=clientes">Regresar</a><?}?>
	<a href="usuarios.php?a=editcat&id=<?echo $id_usuario?>">Cambiar Perfil</a>-

	<?
	$db=new mysql($db_host,$db_name,$db_user,$db_password);
	$db->connect();
	$qsql="select * from usuarios where id_usuario='$id_usuario'";
	$db->query($qsql);
	?>
	<table width="400" border="1">
		<?
		if($db->num_rows()>0)
		{
			while($row=$db->fetch_assoc())
			{
				?>
				<tr>
					<td><b>Nombre</b></td>
					<td><?echo $row['nombre']?></td>
				</tr>
				<tr>
					<td><b>A. Paterno</b></td>
					<td><?echo $row['a_paterno']?></td>
				</tr>
				<tr>
					<td><b>A. Materno</b></td>
					<td><?echo $row['a_materno']?></td>
				</tr>
				<tr>
					<td><b>Direccion</b></td>
					<td><?echo $row['direccion']?></td>
				</tr>
				<tr>
					<td><b>Ciudad</b></td>
					<td><?echo $row['ciudad']?></td>
				</tr>
				<tr>
					<td><b>Estado</b></td>
					<td><?echo $row['estado']?></td>
				</tr>	
				<tr>
					<td><b>Coigo Postal</b></td>
					<td><?echo $row['cp']?></td>
				</tr>
				<tr>
					<td><b>Telefono 1</b></td>
					<td><?echo $row['telefono']?></td>
				</tr>
				<tr>
					<td><b>Telefono 2</b></td>
					<td><?echo $row['telefono2']?></td>
				</tr>
				<tr>
					<td><b>Correo Electronico</b></td>
					<td><?echo $row['email']?></td>
				</tr>						
				<tr>
					<td><b>Correo Alternativo</b></td>
					<td><?echo $row['email2']?></td>
				</tr>
				<?
				if($t_usuario==2)
				{
				?>
				<tr>
					<td colspan=2><div align="center"><font  face="Verdana, Arial, Helvetica, sans-serif" size="2"><b>Datos de Facturacion</b></font></div></td>
					
				</tr>
				<tr>
					<td><b>Direccion</b></td>
					<td><?echo $row['direccion_fact']?></td>
				</tr>
				<tr>
					<td><b>Ciudad</b></td>
					<td><?echo $row['ciudad_fact']?></td>
				</tr>
				<tr>
					<td><b>Estado</b></td>
					<td><?echo $row['estado_fact']?></td>
				</tr>	
				<tr>
					<td><b>Coigo Postal</b></td>
					<td><?echo $row['cp_fact']?></td>
				</tr>
				<tr>
					<td><b>RFC</b></td>
					<td><?echo $row['rfc']?></td>
				</tr>				
				<?
				}
			}
		}
}
function mostrarusuarios()
{
	global $filter;
	global $campo;
	global $cadena;
	$quitar = @$_GET["b"];
	
	if (isset($_POST["filter"])) $filter = @$_POST["filter"];
	if (!isset($filter) && isset($_SESSION["filter"])) $filter = $_SESSION["filter"];
	if (isset($_POST["campo"])) $campo = @$_POST["campo"];
	if (!isset($campo) && isset($_SESSION["campo"])) $campo = $_SESSION["campo"];
	if($quitar=="reset"){$filter=""; $campo="";}
	?>
	<h1>Catalogo de Usuarios</h1>
	<title>Catalogo de Usuarios</title>

	<a href="index.php">Regresar</a>
	<a href="registrar.php?tipo=1">Agregar Usuario</a>
	<hr>
	<form method="post" action="usuarios.php?a=usuarios">
		Filtro <input name="filter" type="text" size="23" maxlength="84" value="<?echo $filter?>" />
		<select name="campo">
			<option value="nombre"<?if($campo=="nombre"){echo "SELECTED";}?>>Nombre</option>
			<option value="a_paterno"<?if($campo=="a_paterno"){echo "SELECTED";}?>>Ap. Paterno</option>
			<option value="a_materno"<?if($campo=="a_materno"){echo "SELECTED";}?>>Ap. Materno</option>
			<option value="ciudad"<?if($campo=="ciudad"){echo "SELECTED";}?>>Ciudad</option>
			<option value="login"<?if($campo=="login"){echo "SELECTED";}?>>Usuario</option>
		</select>
		<input name="filtro" type="submit" value="Aplicar Filtro" />
		<a href="usuarios.php?a=usuarios&b=reset">Quitar Filtro</a>
	</form>
	<?
	if(!$filter==""){$cadena="AND $campo like '%$filter%'";}
	else{$cadena="";}
	include("conf.php");
	include("include/mysql.class.php");

	$db=new mysql($db_host,$db_name,$db_user,$db_password);
	$db->connect();

	$max_rows=25;
	$page = (isset($_GET['page'])) ? $_GET['page'] : 1;
	$from = (($page * $max_rows) - $max_rows);  

	//$user_id=$_SESSION['usr_id'];

	$qsql="select * from usuarios where id_tipo_usuario=1 $cadena ORDER BY nombre ASC limit $from,$max_rows";

	$db->query($qsql);
	?>
	<table width="750" border="1">
	<tr>
		<td><b>NOMBRE</b></td>
		<td><b>CORREO E</b></td>
		<td><b>CORREO ALT</b></td>
		<td><b>LOGIN</b></td>
	</tr>
	<?
	
	if($db->num_rows()>0)
	{
		while($row=$db->fetch_assoc())
		{
			if($row['nombre']=='-'){$nombre="";}else{$nombre=$row['nombre'];}
			if($row['a_paterno']=='-'){$a_paterno="";}else{$a_paterno=$row['a_paterno'];}
			if($row['a_materno']=='-'){$a_materno="";}else{$a_materno=$row['a_materno'];}
			$nombrecompleto=$nombre." ".$a_paterno." ".$a_materno;
		?>
		<tr>
			<td><?echo $nombrecompleto?></td>
			<td><?echo $row['email']?></td>
			<td><?echo $row['email2']?></td>
			<td><?echo $row['login']?></td>
			<td><a href="usuarios.php?a=viewcat&id=<?echo $row['id_usuario']?>">Ver</a></td>
			<td><a href="usuarios.php?a=editcat&id=<?echo $row['id_usuario']?>">Editar</a></td>
			<td><a href="usuarios.php?a=del&id=<?echo $row['id_usuario']?>">Eliminar</a></td>
			<td><a href="usuarios.php?a=rst&id=<?echo $row['id_usuario']?>">Restablecer Contraseña</a></td>			
		</tr>
		<?
		}
	}
	?></table><?
	$db->query("select count(*) from usuarios where id_tipo_usuario=1 $cadena");
	$row=$db->fetch_row();
	$total_rows=$row[0];
	$total_pages = ceil($total_rows / $max_rows); 

	$paginaactual="usuarios.php?a=usuarios?";
	//previous
	if ($page > 1) {
	$prev = $page - 1;
	$url = $paginaactual."page=$prev";
	//$url = "pagos.php?a=pend&page=$prev";
	echo "<a href=\"$url\">Anterior</a> ";
	}

	//numbers
	for($i = 1; $i <= $total_pages; $i++){
		if(($page) == $i){
			echo "$i ";
		} else {
			echo "<a href=\"".$paginaactual."page=$i\">$i</a> ";
			//echo "<a href=\"pagos.php?a=pend&page=$i\">$i</a> ";
			}
	} 

	//next'
	if ($page < $total_pages) {
	$next = $page + 1;
	$url = $paginaactual."page=$next";
	//$url = "pagos.php?a=pend&page=$next";
	echo "<a href=\"$url\">Siguiente</a>";
	}		
}

function editarcatalogo()
{
	include("conf.php");
	include("functions.php");
	include("include/mysql.class.php");
	
	$id_usuario = @$_GET["id"];
	$t_usuario=tipo_usuario($id_usuario);
	$db=new mysql($db_host,$db_name,$db_user,$db_password);
	$db->connect();
	$qsql="select * from usuarios where id_usuario='$id_usuario'";
	$db->query($qsql);
	if($db->num_rows()>0)
	{
		while($row=$db->fetch_assoc())
		{
			$nombre=$row['nombre'];
			$a_paterno=$row['a_paterno'];
			$a_materno=$row['a_materno'];
			$rfc=$row['rfc'];
			$direccion=$row['direccion'];
			$ciudad=$row['ciudad'];
			$estado=$row['estado'];
			$cp=$row['cp'];
			$direccion_fact=$row['direccion_fact'];
			$ciudad_fact=$row['ciudad_fact'];
			$estado_fact=$row['estado_fact'];
			$cp_fact=$row['cp_fact'];			
			$telefono=$row['telefono'];
			$telefono2=$row['telefono2'];
			$email=$row['email'];
			$email2=$row['email2'];
		}
	}
	?>
	<title>Edicion de Perfiles de Usuario</title>
	<h1>Edicion de Perfiles de Usuario</h1><hr>
	<form method="post" action="usuarios.php">
		<table width="200" border="0"                                                                                                                                                                                                            >
			<input name="catalogo" type="hidden" size="33" maxlength="84" value="1" />		 
			<input name="id_usuario" type="hidden" size="33" maxlength="84" value="<?echo $id_usuario?>" />		 
		 <tr>
			<td><div align="right"><font  face="Verdana, Arial, Helvetica, sans-serif" size="2">Nombre</font></div></td>
			<td><input name="nombre" type="text" size="33" maxlength="84" value="<?echo $nombre?>" /></td>
		  </tr>
		  <tr>
			<td><div align="right"><font  face="Verdana, Arial, Helvetica, sans-serif" size="2">Apellido Paterno</font></div></td>
			<td><input name="apaterno" type="text" size="33" maxlength="84" value="<?echo $a_paterno?>" /></td>
		  </tr>
		  <tr>
			<td><div align="right"><font  face="Verdana, Arial, Helvetica, sans-serif" size="2">Apellido Materno</font></div></td>
			<td><input name="amaterno" type="text" size="33" maxlength="84" value="<?echo $a_materno?>" /></td>
		  </tr>		
		  <tr>
			<td><div align="right"><font  face="Verdana, Arial, Helvetica, sans-serif" size="2">Direccion</font></div></td>
			<td><textarea name="direccion" id="direccion" cols="25" rows="3" ><?echo $direccion?></textarea></td>
		  </tr>
		  <tr>
			<td><div align="right"><font  face="Verdana, Arial, Helvetica, sans-serif" size="2">Ciudad</font></div></td>
			<td><input name="ciudad" type="text" size="33" maxlength="84" value="<?echo $ciudad?>" /></td>
		  </tr>	
		  <tr>
			<td><div align="right"><font  face="Verdana, Arial, Helvetica, sans-serif" size="2">Estado</font></div></td>
			<td>
				<select name="estado" style="width:225px">
					<OPTGROUP LABEL="Seleccione un Estado" selected>
					<option value="Aguascalientes"<?if($estado=="Aguascalientes"){echo "SELECTED";}?>>Aguascalientes</option>
					<option value="Baja California"<?if($estado=="Baja California"){echo "SELECTED";}?>>Baja California</option>
					<option value="Baja California Sur"<?if($estado=="Baja California Sur"){echo "SELECTED";}?>>Baja California Sur</option>
					<option value="Campeche"<?if($estado=="Campeche"){echo "SELECTED";}?>>Campeche</option>
					<option value="Coahuila"<?if($estado=="Coahuila"){echo "SELECTED";}?>>Coahuila</option>
					<option value="Colima"<?if($estado=="Colima"){echo "SELECTED";}?>>Colima</option>
					<option value="Chiapas"<?if($estado=="Chiapas"){echo "SELECTED";}?>>Chiapas</option>
					<option value="Chihuahua"<?if($estado=="Chihuahua"){echo "SELECTED";}?>>Chihuahua</option>
					<option value="Distrito Federal"<?if($estado=="Distrito Federal"){echo "SELECTED";}?>>Distrito Federal</option>
					<option value="Durango"<?if($estado=="Durango"){echo "SELECTED";}?>>Durango</option>
					<option value="Estado de México"<?if($estado=="Estado de México"){echo "SELECTED";}?>>Estado de México</option>
					<option value="Guanajuato"<?if($estado=="Guanajuato"){echo "SELECTED";}?>>Guanajuato</option>
					<option value="Guerrero"<?if($estado=="Guerrero"){echo "SELECTED";}?>>Guerrero</option>
					<option value="Hidalgo"<?if($estado=="Hidalgo"){echo "SELECTED";}?>>Hidalgo</option>
					<option value="Jalisco"<?if($estado=="Jalisco"){echo "SELECTED";}?>>Jalisco</option>
					<option value="Michoacán"<?if($estado=="Michoacán"){echo "SELECTED";}?>>Michoacán</option>
					<option value="Morelos"<?if($estado=="Morelos"){echo "SELECTED";}?>>Morelos</option>
					<option value="Nayarit"<?if($estado=="Nayarit"){echo "SELECTED";}?>>Nayarit</option>
					<option value="Nuevo León"<?if($estado=="Nuevo León"){echo "SELECTED";}?>>Nuevo León</option>
					<option value="Oaxaca"<?if($estado=="Oaxaca"){echo "SELECTED";}?>>Oaxaca</option>
					<option value="Puebla"<?if($estado=="Puebla"){echo "SELECTED";}?>>Puebla</option>
					<option value="Querétaro"<?if($estado=="Querétaro"){echo "SELECTED";}?>>Querétaro</option>
					<option value="Quintana Roo"<?if($estado=="Quintana Roo"){echo "SELECTED";}?>>Quintana Roo</option>
					<option value="San Luis Potosí"<?if($estado=="San Luis Potosí"){echo "SELECTED";}?>>San Luis Potosí</option>
					<option value="Sinaloa"<?if($estado=="Sinaloa"){echo "SELECTED";}?>>Sinaloa</option>
					<option value="Sonora"<?if($estado=="Sonora"){echo "SELECTED";}?>>Sonora</option>
					<option value="Tabasco"<?if($estado=="Tabasco"){echo "SELECTED";}?>>Tabasco</option>
					<option value="Tamaulipas"<?if($estado=="Tamaulipas"){echo "SELECTED";}?>>Tamaulipas</option>
					<option value="Tlaxcala"<?if($estado=="Tlaxcala"){echo "SELECTED";}?>>Tlaxcala</option>
					<option value="Veracruz"<?if($estado=="Veracruz"){echo "SELECTED";}?>>Veracruz</option>
					<option value="Yucatán"<?if($estado=="Yucatán"){echo "SELECTED";}?>>Yucatán</option>
					<option value="Zacatecas"<?if($estado=="Zacatecas"){echo "SELECTED";}?>>Zacatecas</option>
				</select>
			</td>
		  </tr>		
		  <tr>
			<td><div align="right"><font  face="Verdana, Arial, Helvetica, sans-serif" size="2">Codigo Postal</font></div></td>
			<td><input name="cp" type="text" size="33" maxlength="84" value="<?echo $cp?>" /></td>
		  </tr>			  
		  <tr>
			<td><div align="right"><font  face="Verdana, Arial, Helvetica, sans-serif" size="2">Correo Electronico </font></div></td>
			<td><input name="email" type="text" size="33" maxlength="84" value="<?echo $email?>" /></td>
		  </tr>	
		  <tr>
			<td><div align="right"><font  face="Verdana, Arial, Helvetica, sans-serif" size="2">Correo Alternativo </font></div></td>
			<td><input name="email2" type="text" size="33" maxlength="84" value="<?echo $email2?>" /></td>		
		  </tr>	
		  <tr>
			<td><div align="right"><font  face="Verdana, Arial, Helvetica, sans-serif" size="2">Telefono 1</font></div></td>
			<td><input name="telefono" type="text" size="33" maxlength="84" value="<?echo $telefono?>" /></td>
		  </tr>	
		  <tr>
			<td><div align="right"><font  face="Verdana, Arial, Helvetica, sans-serif" size="2">Telefono 2</font></div></td>
			<td><input name="telefono2" type="text" size="33" maxlength="84" value="<?echo $telefono2?>" /></td>		
		  </tr>	
			<?
			if($t_usuario==2)
			{
			?>
		<tr>
			<td colspan=2><div align="center"><font  face="Verdana, Arial, Helvetica, sans-serif" size="3">Datos de Facturacion</font></div></td>
		</tr>
		  <tr>
			<td><div align="right"><font  face="Verdana, Arial, Helvetica, sans-serif" size="2">Direccion</font></div></td>
			<td><textarea name="direccion_fact" id="direccion" cols="25" rows="3" ><?echo $direccion_fact?></textarea></td>
		  </tr>
		  <tr>
			<td><div align="right"><font  face="Verdana, Arial, Helvetica, sans-serif" size="2">Ciudad</font></div></td>
			<td><input name="ciudad_fact" type="text" size="33" maxlength="84" value="<?echo $ciudad_fact?>" /></td>
		  </tr>	
		  <tr>
			<td><div align="right"><font  face="Verdana, Arial, Helvetica, sans-serif" size="2">Estado</font></div></td>
			<td>
				<select name="estado_fact" style="width:225px">
					<OPTGROUP LABEL="Seleccione un Estado" selected>
					<option value="Aguascalientes"<?if($estado_fact=="Aguascalientes"){echo "SELECTED";}?>>Aguascalientes</option>
					<option value="Baja California"<?if($estado_fact=="Baja California"){echo "SELECTED";}?>>Baja California</option>
					<option value="Baja California Sur"<?if($estado_fact=="Baja California Sur"){echo "SELECTED";}?>>Baja California Sur</option>
					<option value="Campeche"<?if($estado_fact=="Campeche"){echo "SELECTED";}?>>Campeche</option>
					<option value="Coahuila"<?if($estado_fact=="Coahuila"){echo "SELECTED";}?>>Coahuila</option>
					<option value="Colima"<?if($estado_fact=="Colima"){echo "SELECTED";}?>>Colima</option>
					<option value="Chiapas"<?if($estado_fact=="Chiapas"){echo "SELECTED";}?>>Chiapas</option>
					<option value="Chihuahua"<?if($estado_fact=="Chihuahua"){echo "SELECTED";}?>>Chihuahua</option>
					<option value="Distrito Federal"<?if($estado_fact=="Distrito Federal"){echo "SELECTED";}?>>Distrito Federal</option>
					<option value="Durango"<?if($estado_fact=="Durango"){echo "SELECTED";}?>>Durango</option>
					<option value="Estado de México"<?if($estado_fact=="Estado de México"){echo "SELECTED";}?>>Estado de México</option>
					<option value="Guanajuato"<?if($estado_fact=="Guanajuato"){echo "SELECTED";}?>>Guanajuato</option>
					<option value="Guerrero"<?if($estado_fact=="Guerrero"){echo "SELECTED";}?>>Guerrero</option>
					<option value="Hidalgo"<?if($estado_fact=="Hidalgo"){echo "SELECTED";}?>>Hidalgo</option>
					<option value="Jalisco"<?if($estado_fact=="Jalisco"){echo "SELECTED";}?>>Jalisco</option>
					<option value="Michoacán"<?if($estado_fact=="Michoacán"){echo "SELECTED";}?>>Michoacán</option>
					<option value="Morelos"<?if($estado_fact=="Morelos"){echo "SELECTED";}?>>Morelos</option>
					<option value="Nayarit"<?if($estado_fact=="Nayarit"){echo "SELECTED";}?>>Nayarit</option>
					<option value="Nuevo León"<?if($estado_fact=="Nuevo León"){echo "SELECTED";}?>>Nuevo León</option>
					<option value="Oaxaca"<?if($estado_fact=="Oaxaca"){echo "SELECTED";}?>>Oaxaca</option>
					<option value="Puebla"<?if($estado_fact=="Puebla"){echo "SELECTED";}?>>Puebla</option>
					<option value="Querétaro"<?if($estado_fact=="Querétaro"){echo "SELECTED";}?>>Querétaro</option>
					<option value="Quintana Roo"<?if($estado_fact=="Quintana Roo"){echo "SELECTED";}?>>Quintana Roo</option>
					<option value="San Luis Potosí"<?if($estado_fact=="San Luis Potosí"){echo "SELECTED";}?>>San Luis Potosí</option>
					<option value="Sinaloa"<?if($estado_fact=="Sinaloa"){echo "SELECTED";}?>>Sinaloa</option>
					<option value="Sonora"<?if($estado_fact=="Sonora"){echo "SELECTED";}?>>Sonora</option>
					<option value="Tabasco"<?if($estado_fact=="Tabasco"){echo "SELECTED";}?>>Tabasco</option>
					<option value="Tamaulipas"<?if($estado_fact=="Tamaulipas"){echo "SELECTED";}?>>Tamaulipas</option>
					<option value="Tlaxcala"<?if($estado_fact=="Tlaxcala"){echo "SELECTED";}?>>Tlaxcala</option>
					<option value="Veracruz"<?if($estado_fact=="Veracruz"){echo "SELECTED";}?>>Veracruz</option>
					<option value="Yucatán"<?if($estado_fact=="Yucatán"){echo "SELECTED";}?>>Yucatán</option>
					<option value="Zacatecas"<?if($estado_fact=="Zacatecas"){echo "SELECTED";}?>>Zacatecas</option>
				</select>
			</td>
		  </tr>
		  <tr>
			<td><div align="right"><font  face="Verdana, Arial, Helvetica, sans-serif" size="2">Codigo Postal</font></div></td>
			<td><input name="cp_fact" type="text" size="33" maxlength="84" value="<?echo $cp_fact?>" /></td>
		  </tr>	
		  <tr>
				<td><div align="right"><font  face="Verdana, Arial, Helvetica, sans-serif" size="2">RFC</font></div></td>
				<td><input name="rfc" type="text" size="33" maxlength="84" value="<?echo $rfc?>" /></td>
			</tr>
			<?
			}
			?>
		  
		  <tr>
			<td><div align="right"><input name="save" type="submit" value="Grabar" /></div></td>
			<td><div align="left"><input type="button" name="cancel" value="Cancelar" onclick="javascript:window.location.href='usuarios.php?a=viewcat&id=<?echo $id_usuario?>'"></div></td>		
		  </tr>
		</table>
	</form>
<?
}
function deleterec()
{
	include("conf.php");
	//include("include/mysql.class.php");
	$id= @$_GET["id"];
	?>
	<form method="post" action="usuarios.php">
		<?echo "Desea borrar el registro? ";?>
		<input name="id" type="hidden" size="33" value="<?echo $id?>"/>
		<input name="yes" type="submit" value="Si" /><input name="no" type="button" value="No" onclick="javascript:window.location.href='usuarios.php'" />
	</form>
	<?
}

function resetpwd()
{
	include("conf.php");
	include("functions.php");
	include("include/mysql.class.php");
	$id_usuario = @$_GET["id"];
	$t_usuario=tipo_usuario($id_usuario);
	if($t_usuario==1){$redir="usuarios.php?a=usuarios";}
	else{$redir="usuarios.php?a=clientes";}
	$db=new mysql($db_host,$db_name,$db_user,$db_password);
	$db->connect();
	$query="UPDATE usuarios SET pwd='12345' WHERE id_usuario=$id_usuario";
	$db->query($query);
	?>
	<script lenguaje="javascript">
		alert("La contraseña se ha restablecido correctamente a 12345");
	</script>
	<?
	redir($redir);
}
if(isset($_POST['save']))
	{
		include("conf.php");
		include("functions.php");
		//include("include/mysql.class.php");
		$catalogo=$_POST['catalogo'];
		if($catalogo==1)
		{
			$id = $_POST['id_usuario'];
			$t_usuario=tipo_usuario($id);
			if($t_usuario==1){$redir="usuarios.php?a=usuarios";}
			else{$redir="usuarios.php?a=clientes";}
		}
		else
		{
			$id = $_SESSION['usr_id'];
			$redir="usuarios.php";
		}
		$nombre=$_POST['nombre'];
		$rfc=strtoupper($_POST['rfc']);
		$apaterno=$_POST['apaterno'];
		$amaterno=$_POST['amaterno'];
		$direccion=$_POST['direccion'];
		$ciudad=$_POST['ciudad'];
		$estado=$_POST['estado'];
		$cp=$_POST['cp'];
		$direccion_fact=$_POST['direccion_fact'];
		$ciudad_fact=$_POST['ciudad_fact'];
		$estado_fact=$_POST['estado_fact'];
		$cp_fact=$_POST['cp_fact'];		
		$email=$_POST['email'];
		$email2=$_POST['email2'];
		$telefono=$_POST['telefono'];
		$telefono2=$_POST['telefono2'];
		$db=new mysql($db_host,$db_name,$db_user,$db_password);
		$db->connect();
		$query="UPDATE usuarios SET nombre='$nombre',a_paterno='$apaterno',a_materno='$amaterno',rfc='$rfc',direccion='$direccion',ciudad='$ciudad',estado='$estado',cp='$cp',direccion_fact='$direccion_fact',ciudad_fact='$ciudad_fact',estado_fact='$estado_fact',cp_fact='$cp_fact',email='$email',email2='$email2',telefono='$telefono',telefono2='$telefono2' WHERE id_usuario=$id";
		$db->query($query);
		redir($redir);
	}
if(isset($_POST['savepwd']))
{
	include("conf.php");
	include("functions.php");
	$id = $_SESSION['usr_id'];
	$passw=$_POST['pwdverificar'];
	if(!empty($passw))
	{
		$db=new mysql($db_host,$db_name,$db_user,$db_password);
		$db->connect();
		$query="UPDATE usuarios SET pwd='$passw'WHERE id_usuario=$id";
		$db->query($query);
		redir("usuarios.php");
	}
}
if(isset($_POST['yes']))
{
		include("conf.php");
		include("functions.php");
		$id = $_POST['id'];
		$t_usuario=tipo_usuario($id);
		if($t_usuario==1){$redir="usuarios.php?a=usuarios";}else{$redir="usuarios.php?a=clientes";}
		$db=new mysql($db_host,$db_name,$db_user,$db_password);
		$db->connect();
		$query="delete from usuarios where id_usuario=$id";
		$db->query($query);
		redir($redir);
}


?>

<hr>