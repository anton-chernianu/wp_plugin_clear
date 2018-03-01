<?php 
	
	function slide_all() {
		global $wpdb;
		$table = $wpdb->prefix . "conci";
		$query = "SELECT * FROM $table ORDER BY id_conci DESC";
		return $wpdb->get_results($query, ARRAY_A);
	}

	function slide_add($title, $content) {
		global $wpdb;

		$title = trim($title);
		$content = trim($content);

		if($title == '' || $content == '') {
			return false;
		}

		$table = $wpdb->prefix . "conci";
		$t = "INSERT INTO $table (name, text) VALUES('%s', '%s')";
		$query = $wpdb->prepare($t, $title, $content);
		$result = $wpdb->query($query);

		if($result === false) {
			die('Error DB');
		}

		return true;
	}

	function slide_get($id_conci) {
		global $wpdb;
		$table = $wpdb->prefix . "conci";
		$t = "SELECT name, text FROM $table WHERE id_conci='%d'";
		$query = $wpdb->prepare($t, $id_conci);
		return $wpdb->get_row($query, ARRAY_A);
	}


	function slide_edit($id_conci, $title, $content) {
		global $wpdb;

		$title = trim($title);
		$content = trim($content);

		if($title == '' || $content == '') {
			return false;
		}

		$table = $wpdb->prefix . "conci";
		$t = "UPDATE $table SET name='%s', text='%s' WHERE id_conci='%d'";
		$query = $wpdb->prepare($t, $title, $content, $id_conci);
		$result = $wpdb->query($query);

		if($result === false) {
			die('Error DB');
		}

		return true;
	}

	function slide_delete($id_conci) {
		global $wpdb;
		$table = $wpdb->prefix . "conci";
		$t = "DELETE FROM $table WHERE id_conci='%d'";
		$query = $wpdb->prepare($t, $id_conci);
		return $wpdb->query($query);
	}

