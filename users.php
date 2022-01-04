
<?php
if ( ! (array_key_exists('logged', $_COOKIE) AND $_COOKIE['logged'] == '1') ) {
	header('Location: index.php');
	exit;
}
?>

<?php include 'header.php';?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Nombre de usuario</th>
      <th scope="col">Correo</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody  >

<!-- ko foreach: users -->
    <tr>
      <th data-bind="text: id" scope="row">1</th>
      <td data-bind="text: name" ></td>
      <td data-bind="text: username" ></td>
      <td data-bind="text: email" ></td>
      <td>
				<button data-bind="click: $parent.selectItem" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#users-mdl">
          <i class="far fa-edit"></i>
        </button>
				<button data-bind="click: $parent.deleteItem" type="button" class="btn btn-primary">
          <i class="fas fa-trash"></i>
        </button>
				<a  data-bind="attr: { href: url() }" class="btn btn-primary" href="#"> <i class="fas fa-eye"></i></a>
      </td>
    </tr>
 <!-- /ko -->
    <tr>
      <th colspan="4"></th>
      <td>
        <button data-bind="click: resetForm" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#users-mdl">
          <i class="fas fa-plus"></i>
        </button>
      </td>
    </tr>

  </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="users-mdl" tabindex="-1" aria-labelledby="users-mdl-lbl" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="users-mdl-lbl">Usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form>
        <div class="form-group">
          <label for="form-name">Nombre</label>
          <input data-bind="value: form().name" type="text" class="form-control" id="form-name" placeholder="Nombre">
        </div>

        <div class="form-group">
          <label for="form-username">Nombre de usuario</label>
          <input data-bind="value: form().username" type="text" class="form-control" id="form-username" placeholder="Nombre de usuario">
        </div>

        <div class="form-group">
          <label for="form-email">Correo</label>
          <input data-bind="value: form().email" type="text" class="form-control" id="form-email" placeholder="Correo">
        </div>

        <br>
        <h5 class="card-title">Direccion</h5>
        <div class="card" >
        	<div class="card-body">

		        <div class="form-group">
		          <label for="form-street">Calle</label>
		          <input data-bind="value: form().address().street" type="text" class="form-control" id="form-street" placeholder="Calle">
		        </div>

		        <div class="form-group">
		          <label for="form-suite">Numero</label>
		          <input data-bind="value: form().address().suite" type="text" class="form-control" id="form-suite" placeholder="Numero">
		        </div>

		        <div class="form-group">
		          <label for="form-city">Ciudad</label>
		          <input data-bind="value: form().address().city" type="text" class="form-control" id="form-city" placeholder="Ciudad">
		        </div>

		        <div class="form-group">
		          <label for="form-zipcode">Codigo postal</label>
		          <input data-bind="value: form().address().zipcode" type="text" class="form-control" id="form-zipcode" placeholder="Codigo postal">
		        </div>

		        <br>
		        <h5 class="card-title">Geolocalizacion</h5>
		        <div class="card" >
		        	<div class="card-body">

				        <div class="form-group">
				          <label for="form-lat">Latitud</label>
				          <input data-bind="value: form().address().geo().lat" type="text" class="form-control" id="form-lat" placeholder="Latitud">
				        </div>

				        <div class="form-group">
				          <label for="form-lng">Longitud</label>
				          <input data-bind="value: form().address().geo().lng" type="text" class="form-control" id="form-lng" placeholder="Longitud">
				        </div>

		        	</div>
		        </div>
        	</div>
        </div>

        <div class="form-group">
          <label for="form-phone">Telefono</label>
          <input data-bind="value: form().phone" type="text" class="form-control" id="form-phone" placeholder="Telefono">
        </div>

        <div class="form-group">
          <label for="form-website">Sitio Web</label>
          <input data-bind="value: form().website" type="text" class="form-control" id="form-website" placeholder="Sitio Web">
        </div>

        <br>
        <h5 class="card-title">Empresa</h5>
        <div class="card" >
        	<div class="card-body">

		        <div class="form-group">
		          <label for="form-companyname">Nombre</label>
		          <input data-bind="value: form().company().name" type="text" class="form-control" id="form-companyname" placeholder="Nombre">
		        </div>

		        <div class="form-group">
		          <label for="form-catchPhrase">Eslogan</label>
		          <input data-bind="value: form().company().catchPhrase" type="text" class="form-control" id="form-catchPhrase" placeholder="Eslogan">
		        </div>

		        <div class="form-group">
		          <label for="form-bs">Giro</label>
		          <input data-bind="value: form().company().bs" type="text" class="form-control" id="form-bs" placeholder="Giro">
		        </div>

        	</div>
        </div>

      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button data-bind="click: addItem" type="button" class="btn btn-primary">Guardar cambios</button>
      </div>
    </div>
  </div>
</div>


<?php include 'foother.php';?>

<script type="text/javascript">

	    function Company(data) {
        var self = this;
        data = data||{};
        self.name        = ko.observable(data.name||"");
				self.catchPhrase = ko.observable(data.catchPhrase||"");
				self.bs          = ko.observable(data.bs||"");
      }

	    function Address(data) {
        var self = this;
        data = data||{};
        self.street  = ko.observable(data.street||"");
        self.suite   = ko.observable(data.suite||"");
        self.city    = ko.observable(data.city||"");
        self.zipcode = ko.observable(data.zipcode||"");
        self.geo  = ko.observable(new Geo(data.geo));
      }

      function Geo(data) {
        var self = this;
        data = data||{};
				self.lat = ko.observable(data.lat||"");
				self.lng = ko.observable(data.lng||"");
      }

      function  User(data) {
        var self = this;
        data = data||{};
				self.id       = ko.observable(data.id);
				self.name     = ko.observable(data.name||"");
				self.username = ko.observable(data.username||"");
				self.email    = ko.observable(data.email||"");
				self.phone    = ko.observable(data.phone||"");
				self.website  = ko.observable(data.website||"");
				self.company  = ko.observable(new Company(data.company));
				self.address  = ko.observable(new Address(data.address));
				self.url = ko.computed(function() {
					return 'detail.php?id='+self.id();
				}, this);
      }

      function Users() {
        var self = this;
        self.form = ko.observable(new User());
        self.users = ko.observableArray([]);

        self.poulate = async function () {
					 await fetch('https://jsonplaceholder.typicode.com/users')
					  .then((response) => response.json())
					  .then((json) =>
					  	self.users($.map(json, function(item) {return new User(item)})));
        }
        self.poulate();

        this.resetForm = ()=>{
          self.form(new User());
        };

        this.selectItem = function (item) {
          self.seleceted = item;
          self.form(new User(ko.toJS(item)));
        }

        this.addItem = async function () {
          let item = ko.toJS(self.form);
          if (undefined == item.id) {

						await fetch('https://jsonplaceholder.typicode.com/users', {
						  method: 'POST',
						  body: ko.toJSON(self.form),
						  headers: {
						    'Content-type': 'application/json; charset=UTF-8',
						  },
						})
						  .then((response) => response.json())
						  .then((json) => self.users.push(new User(json)));

          }else {
						await fetch('https://jsonplaceholder.typicode.com/users/'+item.id, {
							  method: 'PATCH',
							  body: ko.toJSON(self.form),
							  headers: {
							    'Content-type': 'application/json; charset=UTF-8',
							  },
							})
						  .then((response) => response.json())
						  .then((json) =>{
						  	self.users.replace(self.seleceted, new User(json));
						  });
          }
          $("#users-mdl").modal("hide");
        };

        this.deleteItem = async function (item) {
          if (confirm('Desea eliminar el elemento')) {
						await fetch('https://jsonplaceholder.typicode.com/users/'+item.id(), {
						  method: 'DELETE',
						})
						.then((response) => response.json())
  					.then((json) => self.users.remove(item));
          }
        };

      }

      jQuery(document).ready(function($) {
        ko.applyBindings(new Users());
      });

</script>

  </body>
</html>
