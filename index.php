﻿<?php include_once "api/contacts/select_all.php"; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>Backbone.js Web App</title>
        <link rel="stylesheet" href="css/screen.css" />
    </head>
    <body>
        <div id="contacts">
            <header>
                <div id="filter"><label>Show me:</label></div>
                <a id="showForm" href="#">Add new contact</a>
                <form id="addContact" action="#">
                    <label for="photo">Photo:</label><input id="photo" type="file" />
                    <label for="name">Name:</label><input id="name" />
                    <label for="type">Type:</label><input id="type" />
                    <label for="address">Address:</label><input id="address" />
                    <label for="tel">Tel:</label><input id="tel" />
                    <label for="email">Email:</label><input id="email" />
                    <button id="add">Add</button>
                </form>
            </header>
        </div>
        <script id="contactTemplate" type="text/template">
            <img src="{{ photo }}" alt="{{ name }}" />
            <h1>{{ name }}<span>{{ type }}</span></h1>
            <div>{{ address }}</div>
            <dl>
                <dt>Tel:</dt><dd>{{ tel }}</dd>
                <dt>Email:</dt><dd><a href="mailto:{{ email }}">{{ email }}</a></dd>
            </dl>
            <button class="delete">Delete</button>
            <button class="edit">Edit</button>
        </script>
        <script id="contactEditTemplate" type="text/template">
            <form action="#">
                <input class="photo" type="file" value="{{ photo }}" />
                <input class="name" value="{{ name }}" />
                <input id="type" type="hidden" value="{{ type }}" />
                <input class="address" value="{{ address }}" />
                <input class="tel" value="{{ tel }}" />
                <input class="email" value="{{ email }}" />
                <button class="save">Save</button>
                <button class="cancel">Cancel</button>
            </form>
        </script>
        <!--script src="js/jquery-1.7.1.min.js"></script-->
		<script src="js/jquery-1.9.0.js"></script>
        <!--script src="js/underscore-min.js"></script-->
		<script src="js/underscore.js"></script>
        <!--script src="js/backbone-min.js"></script-->
		<script src="js/backbone.js"></script>
		
        <script>
            var contacts = <?php echo getAllContacts() ?>
            //var contacts = "";
        </script>
        <script src="js/app.js"></script>
    </body>
</html>