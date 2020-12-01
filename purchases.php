<?php
    require_once "header3.php";
?>

<DOCTYPE html>
<html>
    <head>
      <link rel="stylesheet" href="node_modules\bulma\css\bulma.min.css">
      <script src="node_modules\axios\dist\axios.min.js"></script>
    </head>
    <body>
        <div class="box">
          <div class= "columns is-centered is-2">
                <div class= "column is-half">
                    <div class= "notificacion is-link">
                        <h1>SISTEMA ESCOLAR</h1>
                    </div>
                    <form action="api/purchases" method="post">
                            <div class="field">
                                <label class="label">Nombre</label>
                                <div class="control">
                                    <input class="input" type="text" placeholder="Text input" name="nombre" required autofocus>
                                </div>
                            </div>

                            <div class="field">
                                <label class="label">Apellidos</label>
                                <div class="control">
                                    <input class="input" type="text" placeholder="Text input" name="apellidos" required>
                                </div>
                            </div>

                            <div class="field">
                                <label class="label">Dirección</label>
                                <div class="control">
                                    <input class="input" type="text" placeholder="Text input" name="direccion" required>
                                </div>
                            </div>

                            <div class="field">
                                <label class="label">Email</label>
                                <div class="control has-icons-left has-icons-right">
                                    <input class="input is-danger" type="email" placeholder="Email input" name="email" required value="hello@gmail.com">
                                    <span class="icon is-small is-left">
                                    <i class="fas fa-envelope"></i>
                                    </span>
                                    <span class="icon is-small is-right">
                                    <i class="fas fa-exclamation-triangle"></i>
                                    </span>
                                </div>
                                <p class="help is-danger">This email is invalid</p>
                            </div>

                            <div class="field">
                                <label class="label">Código Postal</label>
                                <div class="control">
                                    <div class="select" >
                                        <select>
                                            <option>77086</option>
                                            <option>77988</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="field">
                                <label class="label">Ciudad</label>
                                <div class="control">
                                    <input class="input" type="text" placeholder="Text input" name="ciudad" required>
                                </div>
                            </div>

                            <br>
                            <div class="field is-grouped">
                                <div class="control">
                                    <button class="button is-link" type="button" onclick="purchases()">Submit</button>
                                </div>
                            </div>
                    </form>

                    <script>
                        function purchases()
                        {
                            axios.post(`api/purchases`, {
                            nombre: document.forms[0].nombre.value,
                            apellidos: document.forms[0].apellidos.value,
                            direccion: document.forms[0].direccion.value,
                            email: document.forms[0].email.value,
                            ciudad: document.forms[0].ciudad.value,
                            }).then(resp => {
                            if (resp.data.ins)
                            {
                                alert("no enviado")
                            }
                            else
                            {
                                alert("enviado")
                            }

                            }).catch(error => {
                            console.log(error)
                            })
                        }
                    </script>
                </div>
            </div>
        </div>
    </body>
</html>