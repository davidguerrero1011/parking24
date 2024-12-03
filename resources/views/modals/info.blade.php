<!-- Modal -->
<div class="modal fade" id="infoModal" style="overflow-y: scroll;" role="dialog" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 title-login" id="infoModalLabel">¿Olvidaste la contraseña?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="bodyModal">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" value="1" id="flexRadioDefault1" onclick="changePassword($(this).val())" checked>
                    <label class="form-check-label" for="flexRadioDefault1">
                        ¿Sabes la contraseña actual?
                    </label>

                    <div id="changePassword" class="d-none">
                        <form method="POST" action="{{ route('update-password') }}">
                            @csrf
                            <div class="mb-3">
                              <label for="emailInput" class="form-label">Email</label>
                              <input type="email" class="form-control" name="currentEmail" onblur="validatePassword($(this).val())" id="emailInput" aria-describedby="emailHelp" required>
                              <input type="hidden" name="userId" id="user" value="">
                              <div id="emailMessageValidate" class="form-text text-danger d-none">El correo ingresado no se encuentra registrado.</div>
                            </div>

                            <div class="mb-3">
                              <label for="passwordInput" class="form-label">Contraseña Nueva</label>
                              <input type="text" class="form-control" name="newPassword" id="passwordInput" aria-describedby="passwordHelp" disabled onblur="checkPasswords($(this).val())">
                              
                              <div id="passwordMessage" class="form-text text-danger d-none">La contraseña debe tener minimo 8 caracteres.</div>
                              <div id="mayusculaMessage" class="form-text text-danger d-none">La contraseña debe tener minimo una mayuscula.</div>
                              <div id="minusculaMessage" class="form-text text-danger d-none">La contraseña debe tener minimo una minuscula.</div>
                              <div id="numbersMessage" class="form-text text-danger d-none">La contraseña debe tener minimo un número.</div>
                            </div>

                            <div class="mb-3">
                              <label for="confirmInput" class="form-label">Confirmar Contraseña</label>
                              <input type="text" class="form-control" onblur="validateConfirmPassword($(this).val())" id="confirmInput" disabled>
                              <div id="confirmMessage" class="form-text text-danger d-none">La confirmación de la contraseña no es la misma.</div>
                            </div>
                            <button type="submit" id="btnPassword">Cambiar</button>
                        </form>
                    </div>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" value="2" onclick="changePassword($(this).val())" id="flexRadioDefault2">
                    <label class="form-check-label" for="flexRadioDefault2">
                        ¿Pedir Soporte?
                    </label>
                    <div id="sendRequestPassword" class="d-none">
                        <form method="POST" action="">
                            <div class="mb-3">
                              <label for="emailSupport" class="form-label">Correo</label>
                              <input type="email" class="form-control" id="emailSupport" aria-describedby="emailHelp">
                              <div id="emailHelp" class="form-text">Ingresa el correo al cual te enviaremos la nueva contraseña.</div>
                            </div>
                            <button type="submit">Cambiar</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-bs-dismiss="modal"
                    id="close">Cancelar</button>
            </div>
        </div>
    </div>
</div>
