<?php
require 'header3.php';
?>
<!DOCTYPE html>
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
                        <h1>MENSAJES</h1>
                    </div>


                    <form action="api/messages" method="post">
                        <div class="field">
                            <label class="label">Nombre</label>
                            <div class="control">
                                <input class="input" type="text" placeholder="name" name="recip" required autofocus>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Mensaje</label>
                            <div class="control">
                                <textarea class="textarea" rows="10" name="texto"></textarea>
                            </div>
                        </div>

                        <div class="field is-grouped">
                            <div class="control">
                                <button class="button is-link" type="button" onclick= "message()">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <script>
            function message()
            {
                axios.post(`api/message`, {
                recip: document.forms[0].recip.value,
                texto: document.forms[0].texto.value,
                }).then(resp => {
                if (resp.data.men)
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
    </body>
</html>