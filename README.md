# codeigniter-cli Generate command line interface #

### Introduction:
This is the preliminary codeigniter comand line interface.
This project streamlines the speed and standardization of software for the model, view and controller of codeigniter.

### Requirements
1.- codeigniter 3.0<br>
2.- Download folder cli on project /mycodeigniter/ or edit APPPATH to route ci<br>
3.- Bootstrap css <= not required<br>

### Use
<ol>
	<li>
		Access to path codeigniter-cli:<br>
		> cd cli/
	</li>
	<li>
		See all help:<br>
		> php codeigniter-cli 
		<br> new	app			name		 Generate controller, model and views
		<br> new	controller	name		 Generate controller and utils
		<br> new	model		name		 Generate model and utils
		<br> new	views		name		 Generate views foldername / list and form
		<br> new	view_form	name|folder/name Generate view form
		<br> new	view_list	name|folder/name Generate view list 
	</li>
	<li>
		Generate new catalog of products: <br>
		> php codeigniter-cli new app products
		<br>Model products was created
		<br>Controller products was created
		<br>Views products was created
		<p>
			see results in:
			<br>localhost/index.php/products/
			<br>localhost/index.php/products/create/
			<br>localhost/index.php/products/edit/1
		</p>
	</li>	
</ol>

### Config my template
You can modify or replace templates in folder template/ all files required
<br>
	controller_template.txt<br>
	model_template.txt <br>
	view_form_template.txt <br>
	view_list_template.txt<br>
<br>
You can also modify the path of the project by assigning the application system
