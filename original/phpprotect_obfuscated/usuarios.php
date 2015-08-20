<?
	session_start();
	if(!$_SESSION['usr_logged'])
	{
		header("location: login.php");
	}
	$Vkdwdmlodtve = 10;
	$Vl1yu4abszwu = 10;
	if (isset($_POST["filter"])) $Vnck1bgjjbtd = @$_POST["filter"];
	if (!isset($Vnck1bgjjbtd) && isset($_SESSION["filter"])) $Vnck1bgjjbtd = $_SESSION["filter"];
	if (isset($_POST["campo"])) $Vmzpbekwz4cl = @$_POST["campo"];
	if (!isset($Vmzpbekwz4cl) && isset($_SESSION["campo"])) $Vmzpbekwz4cl = $_SESSION["campo"];
	
	$Vdhny0g3oyvv = $_GET["page"];
	if (!isset($Vdhny0g3oyvv)) $Vdhny0g3oyvv = 1;
	
	$Vfgynz23hmzn = @$_GET["a"];
	switch ($Vfgynz23hmzn) 
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
	$Vx45bjsvssal = $_SESSION['usr_id'];
	?>	
	<title>Perfil de Usuario</title>
	<h1>Perfil de Usuario</h1>
	<a href="index.php">Regresar</a>-<a href="usuarios.php?a=perfil">Cambiar Perfil</a>-<a href="usuarios.php?a=pass">Cambiar Contrase�a</a>
	<?
	$Viflpsygq44k=new mysql($Viflpsygq44k_host,$Viflpsygq44k_name,$Viflpsygq44k_user,$Viflpsygq44k_password);
	$Viflpsygq44k->connect();
	$Va2nkkdhy450="select * from usuarios where id_usuario='$Vx45bjsvssal'";
	$Viflpsygq44k->query($Va2nkkdhy450);
	?>
	<table width="400" border="1">
		<?
		if($Viflpsygq44k->num_rows()>0)
		{
			while($V3q35cfpll3z=$Viflpsygq44k->fetch_assoc())
			{
				?>

				<tr>
					<td><b>Nombre</b></td>
					<td><?echo $V3q35cfpll3z['nombre']?></td>
				</tr>
				<tr>
					<td><b>A. Paterno</b></td>
					<td><?echo $V3q35cfpll3z['a_paterno']?></td>
				</tr>
				<tr>
					<td><b>A. Materno</b></td>
					<td><?echo $V3q35cfpll3z['a_materno']?></td>
				</tr>
				<tr>
					<td><b>Direccion</b></td>
					<td><?echo $V3q35cfpll3z['direccion']?></td>
				</tr>
				<tr>
					<td><b>Ciudad</b></td>
					<td><?echo $V3q35cfpll3z['ciudad']?></td>
				</tr>
				<tr>
					<td><b>Estado</b></td>
					<td><?echo $V3q35cfpll3z['estado']?></td>
				</tr>	
				<tr>
					<td><b>Coigo Postal</b></td>
					<td><?echo $V3q35cfpll3z['cp']?></td>
				</tr>
				<tr>
					<td><b>Telefono 1</b></td>
					<td><?echo $V3q35cfpll3z['telefono']?></td>
				</tr>
				<tr>
					<td><b>Telefono 2</b></td>
					<td><?echo $V3q35cfpll3z['telefono2']?></td>
				</tr>
				<tr>
					<td><b>Correo Electronico</b></td>
					<td><?echo $V3q35cfpll3z['email']?></td>
				</tr>						
				<tr>
					<td><b>Correo Alternativo</b></td>
					<td><?echo $V3q35cfpll3z['email2']?></td>
				</tr>
				<?
				if($Vux3chut224d==2)
				{
				?>
				<tr>
					<td colspan=2><div align="center"><font  face="Verdana, Arial, Helvetica, sans-serif" size="2"><b>Datos de Facturacion</b></font></div></td>
					
				</tr>
				<tr>
					<td><b>Direccion</b></td>
					<td><?echo $V3q35cfpll3z['direccion_fact']?></td>
				</tr>
				<tr>
					<td><b>Ciudad</b></td>
					<td><?echo $V3q35cfpll3z['ciudad_fact']?></td>
				</tr>
				<tr>
					<td><b>Estado</b></td>
					<td><?echo $V3q35cfpll3z['estado_fact']?></td>
				</tr>	
				<tr>
					<td><b>Coigo Postal</b></td>
					<td><?echo $V3q35cfpll3z['cp_fact']?></td>
				</tr>
				<tr>
					<td><b>RFC</b></td>
					<td><?echo $V3q35cfpll3z['rfc']?></td>
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
	$Vx45bjsvssal = $_SESSION['usr_id'];
	$Viflpsygq44k=new mysql($Viflpsygq44k_host,$Viflpsygq44k_name,$Viflpsygq44k_user,$Viflpsygq44k_password);
	$Viflpsygq44k->connect();
	$Va2nkkdhy450="select * from usuarios where id_usuario='$Vx45bjsvssal'";
	$Viflpsygq44k->query($Va2nkkdhy450);
	if($Viflpsygq44k->num_rows()>0)
	{
		while($V3q35cfpll3z=$Viflpsygq44k->fetch_assoc())
		{
			$V1rzlqut2pvl=$V3q35cfpll3z['nombre'];
			$Vfgynz23hmzn_paterno=$V3q35cfpll3z['a_paterno'];
			$Vfgynz23hmzn_materno=$V3q35cfpll3z['a_materno'];
			$Vuoiiu2iihgi=$V3q35cfpll3z['rfc'];
			$Vyya5snsrwss=$V3q35cfpll3z['direccion'];
			$Vdn1ax1ihd13=$V3q35cfpll3z['ciudad'];
			$Vtfkauq20pz4=$V3q35cfpll3z['estado'];
			$Vtvszbqxer54=$V3q35cfpll3z['cp'];
			$Vyya5snsrwss_fact=$V3q35cfpll3z['direccion_fact'];
			$Vdn1ax1ihd13_fact=$V3q35cfpll3z['ciudad_fact'];
			$Vtfkauq20pz4_fact=$V3q35cfpll3z['estado_fact'];
			$Vtvszbqxer54_fact=$V3q35cfpll3z['cp_fact'];			
			$Vn42o5h4dv3c=$V3q35cfpll3z['telefono'];
			$Vn42o5h4dv3c2=$V3q35cfpll3z['telefono2'];
			$Vo5fxmz1l2n2=$V3q35cfpll3z['email'];
			$Vo5fxmz1l2n22=$V3q35cfpll3z['email2'];
		}
	}
	?>
	<title>Edicion de Perfiles de Usuario</title>
	<h1>Edicion de Perfiles de Usuario</h1><hr>
	<form method="post" action="usuarios.php">
		<table width="200" border="0"                                                                                                                                                                                                            >	 
			<input name="id_usuario" type="hidden" size="33" maxlength="84" value="<?echo $Vx45bjsvssal?>" />		 
		 <tr>
			<td><div align="right"><font  face="Verdana, Arial, Helvetica, sans-serif" size="2">Nombre</font></div></td>
			<td><input name="nombre" type="text" size="33" maxlength="84" value="<?echo $V1rzlqut2pvl?>" /></td>
		  </tr>
		  <tr>
			<td><div align="right"><font  face="Verdana, Arial, Helvetica, sans-serif" size="2">Apellido Paterno</font></div></td>
			<td><input name="apaterno" type="text" size="33" maxlength="84" value="<?echo $Vfgynz23hmzn_paterno?>" /></td>
		  </tr>
		  <tr>
			<td><div align="right"><font  face="Verdana, Arial, Helvetica, sans-serif" size="2">Apellido Materno</font></div></td>
			<td><input name="amaterno" type="text" size="33" maxlength="84" value="<?echo $Vfgynz23hmzn_materno?>" /></td>
		  </tr>		
		  <tr>
			<td><div align="right"><font  face="Verdana, Arial, Helvetica, sans-serif" size="2">Direccion</font></div></td>
			<td><textarea name="direccion" id="direccion" cols="25" rows="3" ><?echo $Vyya5snsrwss?></textarea></td>
		  </tr>
		  <tr>
			<td><div align="right"><font  face="Verdana, Arial, Helvetica, sans-serif" size="2">Ciudad</font></div></td>
			<td><input name="ciudad" type="text" size="33" maxlength="84" value="<?echo $Vdn1ax1ihd13?>" /></td>
		  </tr>	
		  <tr>
			<td><div align="right"><font  face="Verdana, Arial, Helvetica, sans-serif" size="2">Estado</font></div></td>
			<td>
				<select name="estado" style="width:225px">
					<OPTGROUP LABEL="Seleccione un Estado" selected>
					<option value="Aguascalientes"<?if($Vtfkauq20pz4=="Aguascalientes"){echo "SELECTED";}?>>Aguascalientes</option>
					<option value="Baja California"<?if($Vtfkauq20pz4=="Baja California"){echo "SELECTED";}?>>Baja California</option>
					<option value="Baja California Sur"<?if($Vtfkauq20pz4=="Baja California Sur"){echo "SELECTED";}?>>Baja California Sur</option>
					<option value="Campeche"<?if($Vtfkauq20pz4=="Campeche"){echo "SELECTED";}?>>Campeche</option>
					<option value="Coahuila"<?if($Vtfkauq20pz4=="Coahuila"){echo "SELECTED";}?>>Coahuila</option>
					<option value="Colima"<?if($Vtfkauq20pz4=="Colima"){echo "SELECTED";}?>>Colima</option>
					<option value="Chiapas"<?if($Vtfkauq20pz4=="Chiapas"){echo "SELECTED";}?>>Chiapas</option>
					<option value="Chihuahua"<?if($Vtfkauq20pz4=="Chihuahua"){echo "SELECTED";}?>>Chihuahua</option>
					<option value="Distrito Federal"<?if($Vtfkauq20pz4=="Distrito Federal"){echo "SELECTED";}?>>Distrito Federal</option>
					<option value="Durango"<?if($Vtfkauq20pz4=="Durango"){echo "SELECTED";}?>>Durango</option>
					<option value="Estado de M�xico"<?if($Vtfkauq20pz4=="Estado de M�xico"){echo "SELECTED";}?>>Estado de M�xico</option>
					<option value="Guanajuato"<?if($Vtfkauq20pz4=="Guanajuato"){echo "SELECTED";}?>>Guanajuato</option>
					<option value="Guerrero"<?if($Vtfkauq20pz4=="Guerrero"){echo "SELECTED";}?>>Guerrero</option>
					<option value="Hidalgo"<?if($Vtfkauq20pz4=="Hidalgo"){echo "SELECTED";}?>>Hidalgo</option>
					<option value="Jalisco"<?if($Vtfkauq20pz4=="Jalisco"){echo "SELECTED";}?>>Jalisco</option>
					<option value="Michoac�n"<?if($Vtfkauq20pz4=="Michoac�n"){echo "SELECTED";}?>>Michoac�n</option>
					<option value="Morelos"<?if($Vtfkauq20pz4=="Morelos"){echo "SELECTED";}?>>Morelos</option>
					<option value="Nayarit"<?if($Vtfkauq20pz4=="Nayarit"){echo "SELECTED";}?>>Nayarit</option>
					<option value="Nuevo Le�n"<?if($Vtfkauq20pz4=="Nuevo Le�n"){echo "SELECTED";}?>>Nuevo Le�n</option>
					<option value="Oaxaca"<?if($Vtfkauq20pz4=="Oaxaca"){echo "SELECTED";}?>>Oaxaca</option>
					<option value="Puebla"<?if($Vtfkauq20pz4=="Puebla"){echo "SELECTED";}?>>Puebla</option>
					<option value="Quer�taro"<?if($Vtfkauq20pz4=="Quer�taro"){echo "SELECTED";}?>>Quer�taro</option>
					<option value="Quintana Roo"<?if($Vtfkauq20pz4=="Quintana Roo"){echo "SELECTED";}?>>Quintana Roo</option>
					<option value="San Luis Potos�"<?if($Vtfkauq20pz4=="San Luis Potos�"){echo "SELECTED";}?>>San Luis Potos�</option>
					<option value="Sinaloa"<?if($Vtfkauq20pz4=="Sinaloa"){echo "SELECTED";}?>>Sinaloa</option>
					<option value="Sonora"<?if($Vtfkauq20pz4=="Sonora"){echo "SELECTED";}?>>Sonora</option>
					<option value="Tabasco"<?if($Vtfkauq20pz4=="Tabasco"){echo "SELECTED";}?>>Tabasco</option>
					<option value="Tamaulipas"<?if($Vtfkauq20pz4=="Tamaulipas"){echo "SELECTED";}?>>Tamaulipas</option>
					<option value="Tlaxcala"<?if($Vtfkauq20pz4=="Tlaxcala"){echo "SELECTED";}?>>Tlaxcala</option>
					<option value="Veracruz"<?if($Vtfkauq20pz4=="Veracruz"){echo "SELECTED";}?>>Veracruz</option>
					<option value="Yucat�n"<?if($Vtfkauq20pz4=="Yucat�n"){echo "SELECTED";}?>>Yucat�n</option>
					<option value="Zacatecas"<?if($Vtfkauq20pz4=="Zacatecas"){echo "SELECTED";}?>>Zacatecas</option>
				</select>
			</td>
		  </tr>		
		  <tr>
			<td><div align="right"><font  face="Verdana, Arial, Helvetica, sans-serif" size="2">Codigo Postal</font></div></td>
			<td><input name="cp" type="text" size="33" maxlength="84" value="<?echo $Vtvszbqxer54?>" /></td>
		  </tr>			  
		  <tr>
			<td><div align="right"><font  face="Verdana, Arial, Helvetica, sans-serif" size="2">Correo Electronico </font></div></td>
			<td><input name="email" type="text" size="33" maxlength="84" value="<?echo $Vo5fxmz1l2n2?>" /></td>
		  </tr>	
		  <tr>
			<td><div align="right"><font  face="Verdana, Arial, Helvetica, sans-serif" size="2">Correo Alternativo </font></div></td>
			<td><input name="email2" type="text" size="33" maxlength="84" value="<?echo $Vo5fxmz1l2n22?>" /></td>		
		  </tr>	
		  <tr>
			<td><div align="right"><font  face="Verdana, Arial, Helvetica, sans-serif" size="2">Telefono 1</font></div></td>
			<td><input name="telefono" type="text" size="33" maxlength="84" value="<?echo $Vn42o5h4dv3c?>" /></td>
		  </tr>	
		  <tr>
			<td><div align="right"><font  face="Verdana, Arial, Helvetica, sans-serif" size="2">Telefono 2</font></div></td>
			<td><input name="telefono2" type="text" size="33" maxlength="84" value="<?echo $Vn42o5h4dv3c2?>" /></td>		
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
	$Vx45bjsvssal = $_SESSION['usr_id'];
	$Viflpsygq44k=new mysql($Viflpsygq44k_host,$Viflpsygq44k_name,$Viflpsygq44k_user,$Viflpsygq44k_password);
	$Viflpsygq44k->connect();
	$Va2nkkdhy450="select pwd from usuarios where id_usuario='$Vx45bjsvssal'";
	$Viflpsygq44k->query($Va2nkkdhy450);
	if($Viflpsygq44k->num_rows()>0)
	{
		while($V3q35cfpll3z=$Viflpsygq44k->fetch_assoc())
		{
			$Vhlnyhoob1tb=$V3q35cfpll3z['pwd'];

		}
	}	
	
?>
	<h1>Cambio de Contrase�a</h1>
	<title>Cambio de Contrase�a</title>
	<form method="post" action="usuarios.php" name="pass">

		<table width="200" border="0"                                                                                                                                                                                                            >

		  <tr>
			<input name="val" type="hidden"  size="33" maxlength="30" value="<?echo $Vhlnyhoob1tb?>" />
			<td><div align="right"><font  face="Verdana, Arial, Helvetica, sans-serif" size="2">contrase�a anterior</font></div></td>
			<td><input name="pwdanterior" type="password" size="33" maxlength="30" value="" onblur="javascript:validaranterior()"/></td>
		  </tr>	
		  <tr>
			<td><div align="right"><font  face="Verdana, Arial, Helvetica, sans-serif" size="2">contrase�a nueva</font></div></td>
			<td><input name="pwdnuevo" type="password" size="33" maxlength="30" value="" /></td>
		  </tr>	
		  <tr>
			<td><div align="right"><font  face="Verdana, Arial, Helvetica, sans-serif" size="2">verificar contrase�a</font></div></td>
			<td><input name="pwdverificar" type="password" size="33" maxlength="30" value="" onblur="javascript:validarnuevo()" /></td>
		  </tr>			  
		  <tr>
			<td><div align="right"><input type="submit" name="savepwd"  value="Grabar" /></div></td>
			<td><div align="left"><input type="button" name="cancel" value="Cancelar" onclick="javascript:window.location.href='usuarios.php'"></div></td>		
		  </tr>
		</table>
	</form>
	<script lenguaje="javascript">
	
	function validaranterior()
	{
		
		if(document.pass.val.value==document.pass.pwdanterior.value)
		{
			pwdanterior=true;
		}
		else
		{
			alert("Verifique que su contrase�a actual este correcta");
			
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
			alert("La contrase�a no corresponde");
			document.pass.pwdnuevo.focus();
		}	
	}

	</script>
<?
}	
function mostrarclientes()
{
	global $Vnck1bgjjbtd;
	global $Vmzpbekwz4cl;
	global $V04liz5j2g1l;
	$Vyfo0vgpqpzi = @$_GET["b"];
	
	if (isset($_POST["filter"])) $Vnck1bgjjbtd = @$_POST["filter"];
	if (!isset($Vnck1bgjjbtd) && isset($_SESSION["filter"])) $Vnck1bgjjbtd = $_SESSION["filter"];
	if (isset($_POST["campo"])) $Vmzpbekwz4cl = @$_POST["campo"];
	if (!isset($Vmzpbekwz4cl) && isset($_SESSION["campo"])) $Vmzpbekwz4cl = $_SESSION["campo"];
	if($Vyfo0vgpqpzi=="reset"){$Vnck1bgjjbtd=""; $Vmzpbekwz4cl="";}
	?>
	<h1>Catalogo de Clientes</h1>
	<title>Catalogo de Clientes</title>

	<a href="index.php">Regresar</a>
	<a href="registrar.php">Agregar Cliente</a>
	<hr>
	<form method="post" action="usuarios.php?a=clientes">
		Filtro <input name="filter" type="text" size="23" maxlength="84" value="<?echo $Vnck1bgjjbtd?>" />
		<select name="campo">
			<option value="nombre"<?if($Vmzpbekwz4cl=="nombre"){echo "SELECTED";}?>>Nombre</option>
			<option value="a_paterno"<?if($Vmzpbekwz4cl=="a_paterno"){echo "SELECTED";}?>>Ap. Paterno</option>
			<option value="a_materno"<?if($Vmzpbekwz4cl=="a_materno"){echo "SELECTED";}?>>Ap. Materno</option>
			<option value="ciudad"<?if($Vmzpbekwz4cl=="ciudad"){echo "SELECTED";}?>>Ciudad</option>
			<option value="login"<?if($Vmzpbekwz4cl=="login"){echo "SELECTED";}?>>Usuario</option>
		</select>
		<input name="filtro" type="submit" value="Aplicar Filtro" />
		<a href="usuarios.php?a=clientes&b=reset">Quitar Filtro</a>
	</form>
	<?
	if(!$Vnck1bgjjbtd==""){$V04liz5j2g1l="AND $Vmzpbekwz4cl like '%$Vnck1bgjjbtd%'";}
	else{$V04liz5j2g1l="";}
	include("conf.php");
	include("include/mysql.class.php");

	$Viflpsygq44k=new mysql($Viflpsygq44k_host,$Viflpsygq44k_name,$Viflpsygq44k_user,$Viflpsygq44k_password);
	$Viflpsygq44k->connect();

	$Vrhf12sth41u=25;
	$Vdhny0g3oyvv = (isset($_GET['page'])) ? $_GET['page'] : 1;
	$Vuucpdzdzpjk = (($Vdhny0g3oyvv * $Vrhf12sth41u) - $Vrhf12sth41u);  

	

	$Va2nkkdhy450="select * from usuarios where id_tipo_usuario=2 $V04liz5j2g1l ORDER BY nombre ASC limit $Vuucpdzdzpjk,$Vrhf12sth41u";

	$Viflpsygq44k->query($Va2nkkdhy450);
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
	
	if($Viflpsygq44k->num_rows()>0)
	{
		while($V3q35cfpll3z=$Viflpsygq44k->fetch_assoc())
		{
			if($V3q35cfpll3z['nombre']=='-'){$V1rzlqut2pvl="";}else{$V1rzlqut2pvl=$V3q35cfpll3z['nombre'];}
			if($V3q35cfpll3z['a_paterno']=='-'){$Vfgynz23hmzn_paterno="";}else{$Vfgynz23hmzn_paterno=$V3q35cfpll3z['a_paterno'];}
			if($V3q35cfpll3z['a_materno']=='-'){$Vfgynz23hmzn_materno="";}else{$Vfgynz23hmzn_materno=$V3q35cfpll3z['a_materno'];}
			$V1rzlqut2pvlcompleto=$V1rzlqut2pvl." ".$Vfgynz23hmzn_paterno." ".$Vfgynz23hmzn_materno;
		?>
		<tr>
			<td><?echo $V1rzlqut2pvlcompleto?></td>
			<td><?echo $V3q35cfpll3z['rfc']?></td>
			<td><?echo $V3q35cfpll3z['email']?></td>
			<td><?echo $V3q35cfpll3z['email2']?></td>
			<td><?echo $V3q35cfpll3z['login']?></td>
			<td><a href="usuarios.php?a=viewcat&id=<?echo $V3q35cfpll3z['id_usuario']?>">Ver</a></td>
			<td><a href="usuarios.php?a=editcat&id=<?echo $V3q35cfpll3z['id_usuario']?>">Editar</a></td>
			<td><a href="usuarios.php?a=del&id=<?echo $V3q35cfpll3z['id_usuario']?>">Eliminar</a></td>
			<td><a href="usuarios.php?a=rst&id=<?echo $V3q35cfpll3z['id_usuario']?>">Restablecer Contrase�a</a></td>
		</tr>
		<?
		}
	}
	?></table><?
	$Viflpsygq44k->query("select count(*) from usuarios where id_tipo_usuario=2 $V04liz5j2g1l");
	$V3q35cfpll3z=$Viflpsygq44k->fetch_row();
	$Vyqn1mm5rv12=$V3q35cfpll3z[0];
	$Vtsvzeg2ion3 = ceil($Vyqn1mm5rv12 / $Vrhf12sth41u); 

	$Vxktkhjpowur="usuarios.php?a=usuarios?";
	
	if ($Vdhny0g3oyvv > 1) {
	$Vi43lfgcgh5i = $Vdhny0g3oyvv - 1;
	$V4kd1xxnrd14 = $Vxktkhjpowur."page=$Vi43lfgcgh5i";
	
	echo "<a href=\"$V4kd1xxnrd14\">Anterior</a> ";
	}

	
	for($Vdwl1w5fwri5 = 1; $Vdwl1w5fwri5 <= $Vtsvzeg2ion3; $Vdwl1w5fwri5++){
		if(($Vdhny0g3oyvv) == $Vdwl1w5fwri5){
			echo "$Vdwl1w5fwri5 ";
		} else {
			echo "<a href=\"".$Vxktkhjpowur."page=$Vdwl1w5fwri5\">$Vdwl1w5fwri5</a> ";
			
			}
	} 

	
	if ($Vdhny0g3oyvv < $Vtsvzeg2ion3) {
	$Vmjbbafn3s30 = $Vdhny0g3oyvv + 1;
	$V4kd1xxnrd14 = $Vxktkhjpowur."page=$Vmjbbafn3s30";
	
	echo "<a href=\"$V4kd1xxnrd14\">Siguiente</a>";
	}		
}
function vercatalogo()
{
	include("conf.php");
	include("functions.php");
	include("include/mysql.class.php");
	
	$Vx45bjsvssal_usuario = @$_GET["id"];
	$Vux3chut224d=tipo_usuario($Vx45bjsvssal_usuario);
	
	?>	
	<title>Perfil de Usuario</title>
	<h1>Perfil de Usuario</h1>
	<?
	if($Vux3chut224d==1)
	{?><a href="usuarios.php?a=usuarios">Regresar</a><?}
	else{?><a href="usuarios.php?a=clientes">Regresar</a><?}?>
	<a href="usuarios.php?a=editcat&id=<?echo $Vx45bjsvssal_usuario?>">Cambiar Perfil</a>-

	<?
	$Viflpsygq44k=new mysql($Viflpsygq44k_host,$Viflpsygq44k_name,$Viflpsygq44k_user,$Viflpsygq44k_password);
	$Viflpsygq44k->connect();
	$Va2nkkdhy450="select * from usuarios where id_usuario='$Vx45bjsvssal_usuario'";
	$Viflpsygq44k->query($Va2nkkdhy450);
	?>
	<table width="400" border="1">
		<?
		if($Viflpsygq44k->num_rows()>0)
		{
			while($V3q35cfpll3z=$Viflpsygq44k->fetch_assoc())
			{
				?>
				<tr>
					<td><b>Nombre</b></td>
					<td><?echo $V3q35cfpll3z['nombre']?></td>
				</tr>
				<tr>
					<td><b>A. Paterno</b></td>
					<td><?echo $V3q35cfpll3z['a_paterno']?></td>
				</tr>
				<tr>
					<td><b>A. Materno</b></td>
					<td><?echo $V3q35cfpll3z['a_materno']?></td>
				</tr>
				<tr>
					<td><b>Direccion</b></td>
					<td><?echo $V3q35cfpll3z['direccion']?></td>
				</tr>
				<tr>
					<td><b>Ciudad</b></td>
					<td><?echo $V3q35cfpll3z['ciudad']?></td>
				</tr>
				<tr>
					<td><b>Estado</b></td>
					<td><?echo $V3q35cfpll3z['estado']?></td>
				</tr>	
				<tr>
					<td><b>Coigo Postal</b></td>
					<td><?echo $V3q35cfpll3z['cp']?></td>
				</tr>
				<tr>
					<td><b>Telefono 1</b></td>
					<td><?echo $V3q35cfpll3z['telefono']?></td>
				</tr>
				<tr>
					<td><b>Telefono 2</b></td>
					<td><?echo $V3q35cfpll3z['telefono2']?></td>
				</tr>
				<tr>
					<td><b>Correo Electronico</b></td>
					<td><?echo $V3q35cfpll3z['email']?></td>
				</tr>						
				<tr>
					<td><b>Correo Alternativo</b></td>
					<td><?echo $V3q35cfpll3z['email2']?></td>
				</tr>
				<?
				if($Vux3chut224d==2)
				{
				?>
				<tr>
					<td colspan=2><div align="center"><font  face="Verdana, Arial, Helvetica, sans-serif" size="2"><b>Datos de Facturacion</b></font></div></td>
					
				</tr>
				<tr>
					<td><b>Direccion</b></td>
					<td><?echo $V3q35cfpll3z['direccion_fact']?></td>
				</tr>
				<tr>
					<td><b>Ciudad</b></td>
					<td><?echo $V3q35cfpll3z['ciudad_fact']?></td>
				</tr>
				<tr>
					<td><b>Estado</b></td>
					<td><?echo $V3q35cfpll3z['estado_fact']?></td>
				</tr>	
				<tr>
					<td><b>Coigo Postal</b></td>
					<td><?echo $V3q35cfpll3z['cp_fact']?></td>
				</tr>
				<tr>
					<td><b>RFC</b></td>
					<td><?echo $V3q35cfpll3z['rfc']?></td>
				</tr>				
				<?
				}
			}
		}
}
function mostrarusuarios()
{
	global $Vnck1bgjjbtd;
	global $Vmzpbekwz4cl;
	global $V04liz5j2g1l;
	$Vyfo0vgpqpzi = @$_GET["b"];
	
	if (isset($_POST["filter"])) $Vnck1bgjjbtd = @$_POST["filter"];
	if (!isset($Vnck1bgjjbtd) && isset($_SESSION["filter"])) $Vnck1bgjjbtd = $_SESSION["filter"];
	if (isset($_POST["campo"])) $Vmzpbekwz4cl = @$_POST["campo"];
	if (!isset($Vmzpbekwz4cl) && isset($_SESSION["campo"])) $Vmzpbekwz4cl = $_SESSION["campo"];
	if($Vyfo0vgpqpzi=="reset"){$Vnck1bgjjbtd=""; $Vmzpbekwz4cl="";}
	?>
	<h1>Catalogo de Usuarios</h1>
	<title>Catalogo de Usuarios</title>

	<a href="index.php">Regresar</a>
	<a href="registrar.php?tipo=1">Agregar Usuario</a>
	<hr>
	<form method="post" action="usuarios.php?a=usuarios">
		Filtro <input name="filter" type="text" size="23" maxlength="84" value="<?echo $Vnck1bgjjbtd?>" />
		<select name="campo">
			<option value="nombre"<?if($Vmzpbekwz4cl=="nombre"){echo "SELECTED";}?>>Nombre</option>
			<option value="a_paterno"<?if($Vmzpbekwz4cl=="a_paterno"){echo "SELECTED";}?>>Ap. Paterno</option>
			<option value="a_materno"<?if($Vmzpbekwz4cl=="a_materno"){echo "SELECTED";}?>>Ap. Materno</option>
			<option value="ciudad"<?if($Vmzpbekwz4cl=="ciudad"){echo "SELECTED";}?>>Ciudad</option>
			<option value="login"<?if($Vmzpbekwz4cl=="login"){echo "SELECTED";}?>>Usuario</option>
		</select>
		<input name="filtro" type="submit" value="Aplicar Filtro" />
		<a href="usuarios.php?a=usuarios&b=reset">Quitar Filtro</a>
	</form>
	<?
	if(!$Vnck1bgjjbtd==""){$V04liz5j2g1l="AND $Vmzpbekwz4cl like '%$Vnck1bgjjbtd%'";}
	else{$V04liz5j2g1l="";}
	include("conf.php");
	include("include/mysql.class.php");

	$Viflpsygq44k=new mysql($Viflpsygq44k_host,$Viflpsygq44k_name,$Viflpsygq44k_user,$Viflpsygq44k_password);
	$Viflpsygq44k->connect();

	$Vrhf12sth41u=25;
	$Vdhny0g3oyvv = (isset($_GET['page'])) ? $_GET['page'] : 1;
	$Vuucpdzdzpjk = (($Vdhny0g3oyvv * $Vrhf12sth41u) - $Vrhf12sth41u);  

	

	$Va2nkkdhy450="select * from usuarios where id_tipo_usuario=1 $V04liz5j2g1l ORDER BY nombre ASC limit $Vuucpdzdzpjk,$Vrhf12sth41u";

	$Viflpsygq44k->query($Va2nkkdhy450);
	?>
	<table width="750" border="1">
	<tr>
		<td><b>NOMBRE</b></td>
		<td><b>CORREO E</b></td>
		<td><b>CORREO ALT</b></td>
		<td><b>LOGIN</b></td>
	</tr>
	<?
	
	if($Viflpsygq44k->num_rows()>0)
	{
		while($V3q35cfpll3z=$Viflpsygq44k->fetch_assoc())
		{
			if($V3q35cfpll3z['nombre']=='-'){$V1rzlqut2pvl="";}else{$V1rzlqut2pvl=$V3q35cfpll3z['nombre'];}
			if($V3q35cfpll3z['a_paterno']=='-'){$Vfgynz23hmzn_paterno="";}else{$Vfgynz23hmzn_paterno=$V3q35cfpll3z['a_paterno'];}
			if($V3q35cfpll3z['a_materno']=='-'){$Vfgynz23hmzn_materno="";}else{$Vfgynz23hmzn_materno=$V3q35cfpll3z['a_materno'];}
			$V1rzlqut2pvlcompleto=$V1rzlqut2pvl." ".$Vfgynz23hmzn_paterno." ".$Vfgynz23hmzn_materno;
		?>
		<tr>
			<td><?echo $V1rzlqut2pvlcompleto?></td>
			<td><?echo $V3q35cfpll3z['email']?></td>
			<td><?echo $V3q35cfpll3z['email2']?></td>
			<td><?echo $V3q35cfpll3z['login']?></td>
			<td><a href="usuarios.php?a=viewcat&id=<?echo $V3q35cfpll3z['id_usuario']?>">Ver</a></td>
			<td><a href="usuarios.php?a=editcat&id=<?echo $V3q35cfpll3z['id_usuario']?>">Editar</a></td>
			<td><a href="usuarios.php?a=del&id=<?echo $V3q35cfpll3z['id_usuario']?>">Eliminar</a></td>
			<td><a href="usuarios.php?a=rst&id=<?echo $V3q35cfpll3z['id_usuario']?>">Restablecer Contrase�a</a></td>			
		</tr>
		<?
		}
	}
	?></table><?
	$Viflpsygq44k->query("select count(*) from usuarios where id_tipo_usuario=1 $V04liz5j2g1l");
	$V3q35cfpll3z=$Viflpsygq44k->fetch_row();
	$Vyqn1mm5rv12=$V3q35cfpll3z[0];
	$Vtsvzeg2ion3 = ceil($Vyqn1mm5rv12 / $Vrhf12sth41u); 

	$Vxktkhjpowur="usuarios.php?a=usuarios?";
	
	if ($Vdhny0g3oyvv > 1) {
	$Vi43lfgcgh5i = $Vdhny0g3oyvv - 1;
	$V4kd1xxnrd14 = $Vxktkhjpowur."page=$Vi43lfgcgh5i";
	
	echo "<a href=\"$V4kd1xxnrd14\">Anterior</a> ";
	}

	
	for($Vdwl1w5fwri5 = 1; $Vdwl1w5fwri5 <= $Vtsvzeg2ion3; $Vdwl1w5fwri5++){
		if(($Vdhny0g3oyvv) == $Vdwl1w5fwri5){
			echo "$Vdwl1w5fwri5 ";
		} else {
			echo "<a href=\"".$Vxktkhjpowur."page=$Vdwl1w5fwri5\">$Vdwl1w5fwri5</a> ";
			
			}
	} 

	
	if ($Vdhny0g3oyvv < $Vtsvzeg2ion3) {
	$Vmjbbafn3s30 = $Vdhny0g3oyvv + 1;
	$V4kd1xxnrd14 = $Vxktkhjpowur."page=$Vmjbbafn3s30";
	
	echo "<a href=\"$V4kd1xxnrd14\">Siguiente</a>";
	}		
}

function editarcatalogo()
{
	include("conf.php");
	include("functions.php");
	include("include/mysql.class.php");
	
	$Vx45bjsvssal_usuario = @$_GET["id"];
	$Vux3chut224d=tipo_usuario($Vx45bjsvssal_usuario);
	$Viflpsygq44k=new mysql($Viflpsygq44k_host,$Viflpsygq44k_name,$Viflpsygq44k_user,$Viflpsygq44k_password);
	$Viflpsygq44k->connect();
	$Va2nkkdhy450="select * from usuarios where id_usuario='$Vx45bjsvssal_usuario'";
	$Viflpsygq44k->query($Va2nkkdhy450);
	if($Viflpsygq44k->num_rows()>0)
	{
		while($V3q35cfpll3z=$Viflpsygq44k->fetch_assoc())
		{
			$V1rzlqut2pvl=$V3q35cfpll3z['nombre'];
			$Vfgynz23hmzn_paterno=$V3q35cfpll3z['a_paterno'];
			$Vfgynz23hmzn_materno=$V3q35cfpll3z['a_materno'];
			$Vuoiiu2iihgi=$V3q35cfpll3z['rfc'];
			$Vyya5snsrwss=$V3q35cfpll3z['direccion'];
			$Vdn1ax1ihd13=$V3q35cfpll3z['ciudad'];
			$Vtfkauq20pz4=$V3q35cfpll3z['estado'];
			$Vtvszbqxer54=$V3q35cfpll3z['cp'];
			$Vyya5snsrwss_fact=$V3q35cfpll3z['direccion_fact'];
			$Vdn1ax1ihd13_fact=$V3q35cfpll3z['ciudad_fact'];
			$Vtfkauq20pz4_fact=$V3q35cfpll3z['estado_fact'];
			$Vtvszbqxer54_fact=$V3q35cfpll3z['cp_fact'];			
			$Vn42o5h4dv3c=$V3q35cfpll3z['telefono'];
			$Vn42o5h4dv3c2=$V3q35cfpll3z['telefono2'];
			$Vo5fxmz1l2n2=$V3q35cfpll3z['email'];
			$Vo5fxmz1l2n22=$V3q35cfpll3z['email2'];
		}
	}
	?>
	<title>Edicion de Perfiles de Usuario</title>
	<h1>Edicion de Perfiles de Usuario</h1><hr>
	<form method="post" action="usuarios.php">
		<table width="200" border="0"                                                                                                                                                                                                            >
			<input name="catalogo" type="hidden" size="33" maxlength="84" value="1" />		 
			<input name="id_usuario" type="hidden" size="33" maxlength="84" value="<?echo $Vx45bjsvssal_usuario?>" />		 
		 <tr>
			<td><div align="right"><font  face="Verdana, Arial, Helvetica, sans-serif" size="2">Nombre</font></div></td>
			<td><input name="nombre" type="text" size="33" maxlength="84" value="<?echo $V1rzlqut2pvl?>" /></td>
		  </tr>
		  <tr>
			<td><div align="right"><font  face="Verdana, Arial, Helvetica, sans-serif" size="2">Apellido Paterno</font></div></td>
			<td><input name="apaterno" type="text" size="33" maxlength="84" value="<?echo $Vfgynz23hmzn_paterno?>" /></td>
		  </tr>
		  <tr>
			<td><div align="right"><font  face="Verdana, Arial, Helvetica, sans-serif" size="2">Apellido Materno</font></div></td>
			<td><input name="amaterno" type="text" size="33" maxlength="84" value="<?echo $Vfgynz23hmzn_materno?>" /></td>
		  </tr>		
		  <tr>
			<td><div align="right"><font  face="Verdana, Arial, Helvetica, sans-serif" size="2">Direccion</font></div></td>
			<td><textarea name="direccion" id="direccion" cols="25" rows="3" ><?echo $Vyya5snsrwss?></textarea></td>
		  </tr>
		  <tr>
			<td><div align="right"><font  face="Verdana, Arial, Helvetica, sans-serif" size="2">Ciudad</font></div></td>
			<td><input name="ciudad" type="text" size="33" maxlength="84" value="<?echo $Vdn1ax1ihd13?>" /></td>
		  </tr>	
		  <tr>
			<td><div align="right"><font  face="Verdana, Arial, Helvetica, sans-serif" size="2">Estado</font></div></td>
			<td>
				<select name="estado" style="width:225px">
					<OPTGROUP LABEL="Seleccione un Estado" selected>
					<option value="Aguascalientes"<?if($Vtfkauq20pz4=="Aguascalientes"){echo "SELECTED";}?>>Aguascalientes</option>
					<option value="Baja California"<?if($Vtfkauq20pz4=="Baja California"){echo "SELECTED";}?>>Baja California</option>
					<option value="Baja California Sur"<?if($Vtfkauq20pz4=="Baja California Sur"){echo "SELECTED";}?>>Baja California Sur</option>
					<option value="Campeche"<?if($Vtfkauq20pz4=="Campeche"){echo "SELECTED";}?>>Campeche</option>
					<option value="Coahuila"<?if($Vtfkauq20pz4=="Coahuila"){echo "SELECTED";}?>>Coahuila</option>
					<option value="Colima"<?if($Vtfkauq20pz4=="Colima"){echo "SELECTED";}?>>Colima</option>
					<option value="Chiapas"<?if($Vtfkauq20pz4=="Chiapas"){echo "SELECTED";}?>>Chiapas</option>
					<option value="Chihuahua"<?if($Vtfkauq20pz4=="Chihuahua"){echo "SELECTED";}?>>Chihuahua</option>
					<option value="Distrito Federal"<?if($Vtfkauq20pz4=="Distrito Federal"){echo "SELECTED";}?>>Distrito Federal</option>
					<option value="Durango"<?if($Vtfkauq20pz4=="Durango"){echo "SELECTED";}?>>Durango</option>
					<option value="Estado de M�xico"<?if($Vtfkauq20pz4=="Estado de M�xico"){echo "SELECTED";}?>>Estado de M�xico</option>
					<option value="Guanajuato"<?if($Vtfkauq20pz4=="Guanajuato"){echo "SELECTED";}?>>Guanajuato</option>
					<option value="Guerrero"<?if($Vtfkauq20pz4=="Guerrero"){echo "SELECTED";}?>>Guerrero</option>
					<option value="Hidalgo"<?if($Vtfkauq20pz4=="Hidalgo"){echo "SELECTED";}?>>Hidalgo</option>
					<option value="Jalisco"<?if($Vtfkauq20pz4=="Jalisco"){echo "SELECTED";}?>>Jalisco</option>
					<option value="Michoac�n"<?if($Vtfkauq20pz4=="Michoac�n"){echo "SELECTED";}?>>Michoac�n</option>
					<option value="Morelos"<?if($Vtfkauq20pz4=="Morelos"){echo "SELECTED";}?>>Morelos</option>
					<option value="Nayarit"<?if($Vtfkauq20pz4=="Nayarit"){echo "SELECTED";}?>>Nayarit</option>
					<option value="Nuevo Le�n"<?if($Vtfkauq20pz4=="Nuevo Le�n"){echo "SELECTED";}?>>Nuevo Le�n</option>
					<option value="Oaxaca"<?if($Vtfkauq20pz4=="Oaxaca"){echo "SELECTED";}?>>Oaxaca</option>
					<option value="Puebla"<?if($Vtfkauq20pz4=="Puebla"){echo "SELECTED";}?>>Puebla</option>
					<option value="Quer�taro"<?if($Vtfkauq20pz4=="Quer�taro"){echo "SELECTED";}?>>Quer�taro</option>
					<option value="Quintana Roo"<?if($Vtfkauq20pz4=="Quintana Roo"){echo "SELECTED";}?>>Quintana Roo</option>
					<option value="San Luis Potos�"<?if($Vtfkauq20pz4=="San Luis Potos�"){echo "SELECTED";}?>>San Luis Potos�</option>
					<option value="Sinaloa"<?if($Vtfkauq20pz4=="Sinaloa"){echo "SELECTED";}?>>Sinaloa</option>
					<option value="Sonora"<?if($Vtfkauq20pz4=="Sonora"){echo "SELECTED";}?>>Sonora</option>
					<option value="Tabasco"<?if($Vtfkauq20pz4=="Tabasco"){echo "SELECTED";}?>>Tabasco</option>
					<option value="Tamaulipas"<?if($Vtfkauq20pz4=="Tamaulipas"){echo "SELECTED";}?>>Tamaulipas</option>
					<option value="Tlaxcala"<?if($Vtfkauq20pz4=="Tlaxcala"){echo "SELECTED";}?>>Tlaxcala</option>
					<option value="Veracruz"<?if($Vtfkauq20pz4=="Veracruz"){echo "SELECTED";}?>>Veracruz</option>
					<option value="Yucat�n"<?if($Vtfkauq20pz4=="Yucat�n"){echo "SELECTED";}?>>Yucat�n</option>
					<option value="Zacatecas"<?if($Vtfkauq20pz4=="Zacatecas"){echo "SELECTED";}?>>Zacatecas</option>
				</select>
			</td>
		  </tr>		
		  <tr>
			<td><div align="right"><font  face="Verdana, Arial, Helvetica, sans-serif" size="2">Codigo Postal</font></div></td>
			<td><input name="cp" type="text" size="33" maxlength="84" value="<?echo $Vtvszbqxer54?>" /></td>
		  </tr>			  
		  <tr>
			<td><div align="right"><font  face="Verdana, Arial, Helvetica, sans-serif" size="2">Correo Electronico </font></div></td>
			<td><input name="email" type="text" size="33" maxlength="84" value="<?echo $Vo5fxmz1l2n2?>" /></td>
		  </tr>	
		  <tr>
			<td><div align="right"><font  face="Verdana, Arial, Helvetica, sans-serif" size="2">Correo Alternativo </font></div></td>
			<td><input name="email2" type="text" size="33" maxlength="84" value="<?echo $Vo5fxmz1l2n22?>" /></td>		
		  </tr>	
		  <tr>
			<td><div align="right"><font  face="Verdana, Arial, Helvetica, sans-serif" size="2">Telefono 1</font></div></td>
			<td><input name="telefono" type="text" size="33" maxlength="84" value="<?echo $Vn42o5h4dv3c?>" /></td>
		  </tr>	
		  <tr>
			<td><div align="right"><font  face="Verdana, Arial, Helvetica, sans-serif" size="2">Telefono 2</font></div></td>
			<td><input name="telefono2" type="text" size="33" maxlength="84" value="<?echo $Vn42o5h4dv3c2?>" /></td>		
		  </tr>	
			<?
			if($Vux3chut224d==2)
			{
			?>
		<tr>
			<td colspan=2><div align="center"><font  face="Verdana, Arial, Helvetica, sans-serif" size="3">Datos de Facturacion</font></div></td>
		</tr>
		  <tr>
			<td><div align="right"><font  face="Verdana, Arial, Helvetica, sans-serif" size="2">Direccion</font></div></td>
			<td><textarea name="direccion_fact" id="direccion" cols="25" rows="3" ><?echo $Vyya5snsrwss_fact?></textarea></td>
		  </tr>
		  <tr>
			<td><div align="right"><font  face="Verdana, Arial, Helvetica, sans-serif" size="2">Ciudad</font></div></td>
			<td><input name="ciudad_fact" type="text" size="33" maxlength="84" value="<?echo $Vdn1ax1ihd13_fact?>" /></td>
		  </tr>	
		  <tr>
			<td><div align="right"><font  face="Verdana, Arial, Helvetica, sans-serif" size="2">Estado</font></div></td>
			<td>
				<select name="estado_fact" style="width:225px">
					<OPTGROUP LABEL="Seleccione un Estado" selected>
					<option value="Aguascalientes"<?if($Vtfkauq20pz4_fact=="Aguascalientes"){echo "SELECTED";}?>>Aguascalientes</option>
					<option value="Baja California"<?if($Vtfkauq20pz4_fact=="Baja California"){echo "SELECTED";}?>>Baja California</option>
					<option value="Baja California Sur"<?if($Vtfkauq20pz4_fact=="Baja California Sur"){echo "SELECTED";}?>>Baja California Sur</option>
					<option value="Campeche"<?if($Vtfkauq20pz4_fact=="Campeche"){echo "SELECTED";}?>>Campeche</option>
					<option value="Coahuila"<?if($Vtfkauq20pz4_fact=="Coahuila"){echo "SELECTED";}?>>Coahuila</option>
					<option value="Colima"<?if($Vtfkauq20pz4_fact=="Colima"){echo "SELECTED";}?>>Colima</option>
					<option value="Chiapas"<?if($Vtfkauq20pz4_fact=="Chiapas"){echo "SELECTED";}?>>Chiapas</option>
					<option value="Chihuahua"<?if($Vtfkauq20pz4_fact=="Chihuahua"){echo "SELECTED";}?>>Chihuahua</option>
					<option value="Distrito Federal"<?if($Vtfkauq20pz4_fact=="Distrito Federal"){echo "SELECTED";}?>>Distrito Federal</option>
					<option value="Durango"<?if($Vtfkauq20pz4_fact=="Durango"){echo "SELECTED";}?>>Durango</option>
					<option value="Estado de M�xico"<?if($Vtfkauq20pz4_fact=="Estado de M�xico"){echo "SELECTED";}?>>Estado de M�xico</option>
					<option value="Guanajuato"<?if($Vtfkauq20pz4_fact=="Guanajuato"){echo "SELECTED";}?>>Guanajuato</option>
					<option value="Guerrero"<?if($Vtfkauq20pz4_fact=="Guerrero"){echo "SELECTED";}?>>Guerrero</option>
					<option value="Hidalgo"<?if($Vtfkauq20pz4_fact=="Hidalgo"){echo "SELECTED";}?>>Hidalgo</option>
					<option value="Jalisco"<?if($Vtfkauq20pz4_fact=="Jalisco"){echo "SELECTED";}?>>Jalisco</option>
					<option value="Michoac�n"<?if($Vtfkauq20pz4_fact=="Michoac�n"){echo "SELECTED";}?>>Michoac�n</option>
					<option value="Morelos"<?if($Vtfkauq20pz4_fact=="Morelos"){echo "SELECTED";}?>>Morelos</option>
					<option value="Nayarit"<?if($Vtfkauq20pz4_fact=="Nayarit"){echo "SELECTED";}?>>Nayarit</option>
					<option value="Nuevo Le�n"<?if($Vtfkauq20pz4_fact=="Nuevo Le�n"){echo "SELECTED";}?>>Nuevo Le�n</option>
					<option value="Oaxaca"<?if($Vtfkauq20pz4_fact=="Oaxaca"){echo "SELECTED";}?>>Oaxaca</option>
					<option value="Puebla"<?if($Vtfkauq20pz4_fact=="Puebla"){echo "SELECTED";}?>>Puebla</option>
					<option value="Quer�taro"<?if($Vtfkauq20pz4_fact=="Quer�taro"){echo "SELECTED";}?>>Quer�taro</option>
					<option value="Quintana Roo"<?if($Vtfkauq20pz4_fact=="Quintana Roo"){echo "SELECTED";}?>>Quintana Roo</option>
					<option value="San Luis Potos�"<?if($Vtfkauq20pz4_fact=="San Luis Potos�"){echo "SELECTED";}?>>San Luis Potos�</option>
					<option value="Sinaloa"<?if($Vtfkauq20pz4_fact=="Sinaloa"){echo "SELECTED";}?>>Sinaloa</option>
					<option value="Sonora"<?if($Vtfkauq20pz4_fact=="Sonora"){echo "SELECTED";}?>>Sonora</option>
					<option value="Tabasco"<?if($Vtfkauq20pz4_fact=="Tabasco"){echo "SELECTED";}?>>Tabasco</option>
					<option value="Tamaulipas"<?if($Vtfkauq20pz4_fact=="Tamaulipas"){echo "SELECTED";}?>>Tamaulipas</option>
					<option value="Tlaxcala"<?if($Vtfkauq20pz4_fact=="Tlaxcala"){echo "SELECTED";}?>>Tlaxcala</option>
					<option value="Veracruz"<?if($Vtfkauq20pz4_fact=="Veracruz"){echo "SELECTED";}?>>Veracruz</option>
					<option value="Yucat�n"<?if($Vtfkauq20pz4_fact=="Yucat�n"){echo "SELECTED";}?>>Yucat�n</option>
					<option value="Zacatecas"<?if($Vtfkauq20pz4_fact=="Zacatecas"){echo "SELECTED";}?>>Zacatecas</option>
				</select>
			</td>
		  </tr>
		  <tr>
			<td><div align="right"><font  face="Verdana, Arial, Helvetica, sans-serif" size="2">Codigo Postal</font></div></td>
			<td><input name="cp_fact" type="text" size="33" maxlength="84" value="<?echo $Vtvszbqxer54_fact?>" /></td>
		  </tr>	
		  <tr>
				<td><div align="right"><font  face="Verdana, Arial, Helvetica, sans-serif" size="2">RFC</font></div></td>
				<td><input name="rfc" type="text" size="33" maxlength="84" value="<?echo $Vuoiiu2iihgi?>" /></td>
			</tr>
			<?
			}
			?>
		  
		  <tr>
			<td><div align="right"><input name="save" type="submit" value="Grabar" /></div></td>
			<td><div align="left"><input type="button" name="cancel" value="Cancelar" onclick="javascript:window.location.href='usuarios.php?a=viewcat&id=<?echo $Vx45bjsvssal_usuario?>'"></div></td>		
		  </tr>
		</table>
	</form>
<?
}
function deleterec()
{
	include("conf.php");
	
	$Vx45bjsvssal= @$_GET["id"];
	?>
	<form method="post" action="usuarios.php">
		<?echo "Desea borrar el registro? ";?>
		<input name="id" type="hidden" size="33" value="<?echo $Vx45bjsvssal?>"/>
		<input name="yes" type="submit" value="Si" /><input name="no" type="button" value="No" onclick="javascript:window.location.href='usuarios.php'" />
	</form>
	<?
}

function resetpwd()
{
	include("conf.php");
	include("functions.php");
	include("include/mysql.class.php");
	$Vx45bjsvssal_usuario = @$_GET["id"];
	$Vux3chut224d=tipo_usuario($Vx45bjsvssal_usuario);
	if($Vux3chut224d==1){$Vayjogcziyh1="usuarios.php?a=usuarios";}
	else{$Vayjogcziyh1="usuarios.php?a=clientes";}
	$Viflpsygq44k=new mysql($Viflpsygq44k_host,$Viflpsygq44k_name,$Viflpsygq44k_user,$Viflpsygq44k_password);
	$Viflpsygq44k->connect();
	$V2ilmci0tsgj="UPDATE usuarios SET pwd='12345' WHERE id_usuario=$Vx45bjsvssal_usuario";
	$Viflpsygq44k->query($V2ilmci0tsgj);
	?>
	<script lenguaje="javascript">
		alert("La contrase�a se ha restablecido correctamente a 12345");
	</script>
	<?
	redir($Vayjogcziyh1);
}
if(isset($_POST['save']))
	{
		include("conf.php");
		include("functions.php");
		
		$Vi5sfipdw3o4=$_POST['catalogo'];
		if($Vi5sfipdw3o4==1)
		{
			$Vx45bjsvssal = $_POST['id_usuario'];
			$Vux3chut224d=tipo_usuario($Vx45bjsvssal);
			if($Vux3chut224d==1){$Vayjogcziyh1="usuarios.php?a=usuarios";}
			else{$Vayjogcziyh1="usuarios.php?a=clientes";}
		}
		else
		{
			$Vx45bjsvssal = $_SESSION['usr_id'];
			$Vayjogcziyh1="usuarios.php";
		}
		$V1rzlqut2pvl=$_POST['nombre'];
		$Vuoiiu2iihgi=strtoupper($_POST['rfc']);
		$Vfgynz23hmznpaterno=$_POST['apaterno'];
		$Vfgynz23hmznmaterno=$_POST['amaterno'];
		$Vyya5snsrwss=$_POST['direccion'];
		$Vdn1ax1ihd13=$_POST['ciudad'];
		$Vtfkauq20pz4=$_POST['estado'];
		$Vtvszbqxer54=$_POST['cp'];
		$Vyya5snsrwss_fact=$_POST['direccion_fact'];
		$Vdn1ax1ihd13_fact=$_POST['ciudad_fact'];
		$Vtfkauq20pz4_fact=$_POST['estado_fact'];
		$Vtvszbqxer54_fact=$_POST['cp_fact'];		
		$Vo5fxmz1l2n2=$_POST['email'];
		$Vo5fxmz1l2n22=$_POST['email2'];
		$Vn42o5h4dv3c=$_POST['telefono'];
		$Vn42o5h4dv3c2=$_POST['telefono2'];
		$Viflpsygq44k=new mysql($Viflpsygq44k_host,$Viflpsygq44k_name,$Viflpsygq44k_user,$Viflpsygq44k_password);
		$Viflpsygq44k->connect();
		$V2ilmci0tsgj="UPDATE usuarios SET nombre='$V1rzlqut2pvl',a_paterno='$Vfgynz23hmznpaterno',a_materno='$Vfgynz23hmznmaterno',rfc='$Vuoiiu2iihgi',direccion='$Vyya5snsrwss',ciudad='$Vdn1ax1ihd13',estado='$Vtfkauq20pz4',cp='$Vtvszbqxer54',direccion_fact='$Vyya5snsrwss_fact',ciudad_fact='$Vdn1ax1ihd13_fact',estado_fact='$Vtfkauq20pz4_fact',cp_fact='$Vtvszbqxer54_fact',email='$Vo5fxmz1l2n2',email2='$Vo5fxmz1l2n22',telefono='$Vn42o5h4dv3c',telefono2='$Vn42o5h4dv3c2' WHERE id_usuario=$Vx45bjsvssal";
		$Viflpsygq44k->query($V2ilmci0tsgj);
		redir($Vayjogcziyh1);
	}
if(isset($_POST['savepwd']))
{
	include("conf.php");
	include("functions.php");
	$Vx45bjsvssal = $_SESSION['usr_id'];
	$Vhlnyhoob1tbw=$_POST['pwdverificar'];
	if(!empty($Vhlnyhoob1tbw))
	{
		$Viflpsygq44k=new mysql($Viflpsygq44k_host,$Viflpsygq44k_name,$Viflpsygq44k_user,$Viflpsygq44k_password);
		$Viflpsygq44k->connect();
		$V2ilmci0tsgj="UPDATE usuarios SET pwd='$Vhlnyhoob1tbw'WHERE id_usuario=$Vx45bjsvssal";
		$Viflpsygq44k->query($V2ilmci0tsgj);
		redir("usuarios.php");
	}
}
if(isset($_POST['yes']))
{
		include("conf.php");
		include("functions.php");
		$Vx45bjsvssal = $_POST['id'];
		$Vux3chut224d=tipo_usuario($Vx45bjsvssal);
		if($Vux3chut224d==1){$Vayjogcziyh1="usuarios.php?a=usuarios";}else{$Vayjogcziyh1="usuarios.php?a=clientes";}
		$Viflpsygq44k=new mysql($Viflpsygq44k_host,$Viflpsygq44k_name,$Viflpsygq44k_user,$Viflpsygq44k_password);
		$Viflpsygq44k->connect();
		$V2ilmci0tsgj="delete from usuarios where id_usuario=$Vx45bjsvssal";
		$Viflpsygq44k->query($V2ilmci0tsgj);
		redir($Vayjogcziyh1);
}


?>

<hr>