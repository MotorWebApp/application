<!-- Modal -->
<div class="modal fade" id="authModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Авторизация в системе</h4>
			</div>
			<div class="modal-body">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#auth" aria-controls="auth" role="tab" data-toggle="tab">Вход</a></li>
					<li role="presentation"><a href="#reg" aria-controls="reg" role="tab" data-toggle="tab">Регистрация</a></li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane fade in active text-center" id="auth">
						<form>
							<div class="form-group">
								<label for="InputEmailIn">Email</label>
								<input type="email" class="form-control" id="InputEmailIn" placeholder="Email">
							</div>
							<div class="form-group">
								<label for="InputPasswordIn">Пароль</label>
								<input type="password" class="form-control" id="InputPasswordIn" placeholder="Пароль">
							</div>
							<button type="submit" class="btn btn-default">Вход</button>
						</form>
					</div>
					<div role="tabpanel" class="tab-pane fade text-center" id="reg">
						<form>
							<div class="form-group">
								<label for="InputEmailUp">Email</label>
								<input type="email" class="form-control" id="InputEmailUp" placeholder="Email">
							</div>
							<div class="form-group">
								<label for="InputPasswordUp1">Пароль</label>
								<input type="password" class="form-control" id="InputPasswordUp1" placeholder="Пароль">
							</div>
							<div class="form-group">
								<label for="InputPasswordUp2">Пароль еще раз</label>
								<input type="password" class="form-control" id="InputPasswordUp2" placeholder="Повтор пароля">
							</div>
							<button type="submit" class="btn btn-default">Регистрация</button>
						</form>
					</div>
				</div>
				<div style="width: 100%; height: 20px; border-bottom: 1px solid black; text-align: center">
					<span style="font-size: 16px; background-color: #F3F5F6; padding: 0 10px;">
						или через VK <!--Padding is optional-->
					</span>
				</div>
				<button type="button" class="btn btn-primary"><span class="social social-vk"></span>Войти через ВК</button>
			</div>
			<div class="text-center modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
			</div>
		</div>
	</div>
</div>