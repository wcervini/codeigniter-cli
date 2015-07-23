# codeigniter-cli Generate command line interface #

### Introduction:
This is the preliminary codeigniter comand line interface.
This project streamlines the speed and standardization of software for the model, view and controller of codeigniter.

### Requirements
1.- codeigniter 3.0
2.- Download folder cli on project /mycodeigniter/ or edit APPPATH to route ci
3.- Bootstrap css <= not required
<ol>
	<li>Demostration</li>
	<li>Edit</li>
</ol>
### Use
1.- access to path codeigniter-cli:
	> cd cli/
2.- see all help:
	> php codeigniter-cli
		new	app			name		 Generate controller, model and views
		new	controller	name		 Generate controller and utils
		new	model		name		 Generate model and utils
		new	views		name		 Generate views foldername / list and form
		new	view_form	name|folder/name Generate view form
		new	view_list	name|folder/name Generate view list 
3.- generate new catalog of products:
	> php codeigniter-cli new app products
		Model products was created
		Controller products was created
		Views products was created

	see results in:
	localhost/index.php/products/
	localhost/index.php/products/create/
	localhost/index.php/products/edit/1

### Config my template
You can modify or replace templates in folder template/ all files required
	controller_template.txt  
	model_template.txt 
	view_form_template.txt 
	view_list_template.txt

You can also modify the path of the project by assigning the application system