<?php

/*
 * Editor server script for DB table books
 * Created by http://editor.datatables.net/generator
 */

// DataTables PHP library and database connection
include( "lib/DataTables.php" );

// Alias Editor classes so they are easy to use
use
	DataTables\Editor,
	DataTables\Editor\Field,
	DataTables\Editor\Format,
	DataTables\Editor\Mjoin,
	DataTables\Editor\Options,
	DataTables\Editor\Upload,
	DataTables\Editor\Validate,
	DataTables\Editor\ValidateOptions;

// The following statement can be removed after the first run (i.e. the database
// table has been created). It is a good idea to do this to help improve
// performance.
$db->sql( "CREATE TABLE IF NOT EXISTS `books` (
	`id` int(10) NOT NULL auto_increment,
	`name` varchar(255),
	`isbn` varchar(255),
	`author` varchar(255),
	`description` varchar(255),
	`registered_date` date,
	PRIMARY KEY( `id` )
);" );

// Build our Editor instance and process the data coming from _POST
Editor::inst( $db, 'books', 'id' )
	->fields(
		Field::inst( 'name' ),
		Field::inst( 'isbn' ),
		Field::inst( 'author' ),
		Field::inst( 'description' ),
		Field::inst( 'registered_date' )
			->validator( Validate::dateFormat( 'D, j M y' ) )
			->getFormatter( Format::dateSqlToFormat( 'D, j M y' ) )
			->setFormatter( Format::dateFormatToSql( 'D, j M y' ) )
	)
	->process( $_POST )
	->json();
