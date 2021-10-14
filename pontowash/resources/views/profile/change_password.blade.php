<div id="changePasswordModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Trocar a Senha</h5>
                <button type="button" aria-label="Close" class="close outline-none" data-dismiss="modal">×</button>
            </div>
            <form method="POST" id='changePasswordForm'>
            <div class="modal-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="alert alert-danger d-none" id=""></div>
                    <input type="hidden" name="is_active" value="1">
                    <input type="hidden" name="user_id" id="editPasswordValidationErrorsBox">
                    {{csrf_field()}}
                <div class="row">
                    <div class="form-group col-sm-12">
                        <label style="color: #000000">Senha Atual:</label><span
                                class="required confirm-pwd"></span><span class="required">*</span>
                        <div class="input-group">
                            <input class="form-control input-group__addon" id="pfCurrentPassword" type="password"
                                   name="password_current" required>
                            <div class="input-group-append input-group__icon">
                                <span class="input-group-text changeType">
                                    <i class="fas fa-lock"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-sm-12">
                        <label style="color: #000000">Nova Senha:</label><span
                                class="required confirm-pwd"></span><span class="required">*</span>
                        <div class="input-group">
                            <input class="form-control input-group__addon" id="pfNewPassword" type="password"
                                   name="password" required>
                            <div class="input-group-append input-group__icon">
                                <span class="input-group-text changeType">
                                    <i class="fas fa-key"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-sm-12">
                        <label style="color: #000000">Confirmar Senha:</label><span
                                class="required confirm-pwd"></span><span class="required">*</span>
                        <div class="input-group">
                            <input class="form-control input-group__addon" id="pfNewConfirmPassword" type="password"
                                   name="password_confirmation" required>
                            <div class="input-group-append input-group__icon">
                                <span class="input-group-text changeType">
                                    <i class="fas fa-key"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary" id="btnPrPasswordEditSave" data-loading-text="<span class='spinner-border spinner-border-sm'></span> Processing...">Salvar</button>
                    <button type="button" class="btn btn-light ml-1" data-dismiss="modal">Cancel
                    </button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<?php
