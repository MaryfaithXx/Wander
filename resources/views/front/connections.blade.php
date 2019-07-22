{{-- require_once("register-login-controller.php"); --}}

	@extends('front.template')

	@section('pageTitle', 'Wander - Connections')

	@section('mainSection')


	{{--// Si no estรก logueda la persona la redirijo al login
if ( !isLogged() ) {
	header('location: login.php');
	exit;
	}--}}

		<!-- search contacts -->
		<section class="people-search">
			<div class="people">
				<h3>Contactos</h3>
			</div>
			<div class="form-search-contacts">
				<form class="contacts" action="#">
					<label for="contacts">Buscar contactos:</label>
					<br>
					<input type="text" id="people-search" placeholder="Ingresa un contacto" name="buscador-contactos">
					<button class="submit-button" type="submit"><i class="fas fa-search"></i> Buscar</button>
				</form>
			</div>
		</section>
		<br>
		<!-- /search contacts -->

		<!-- /contact list -->
	<div class="contact-list">
		<div class="row">
			<div class="col-1">
				<div class="profile-image">
					<img src="images/blank-profile-picture.png" alt="foto perfil">
				</div>
			</div>
			<div class="col-3">
				<div class="person-name">
					Contacto 1
				</div>
			</div>
			<div class="col-3">
				<button class="submit-button" type="submit"><i class="fas fa-search"></i> Mensaje</button>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-1">
				<div class="profile-image">
					<img src="images/blank-profile-picture.png" alt="foto perfil">
				</div>
			</div>
			<div class="col-3">
				<div class="person-name">
					Contacto 2
				</div>
			</div>
			<div class="col-3">
				<button class="submit-button" type="submit"><i class="fas fa-search"></i> Mensaje</button>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-1">
				<div class="profile-image">
					<img src="images/blank-profile-picture.png" alt="foto perfil">
				</div>
			</div>
			<div class="col-3">
				<div class="person-name">
					Contacto 3
				</div>
			</div>
			<div class="col-3">
				<button class="submit-button" type="submit"><i class="fas fa-search"></i> Mensaje</button>
			</div>
		</div>
	</div>
	<!-- /contact list -->

@endsection
