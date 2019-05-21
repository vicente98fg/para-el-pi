BEGIN
	UPDATE codigo JOIN codxusuario ON codigo.id=codxusuario.idcodigo
	SET codigo.usado="si";
END