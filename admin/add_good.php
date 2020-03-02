
<div class="page-container">
	<div class="cat-wrap">
		<form class="add_form" method="post" action="../controllers/admin.php" enctype="multipart/form-data">
			<h2>Add good</h2>
			<h3>Good name:</h3>
			<input type="text" name="name" placeholder="Type good name (max.length 20)" required>

			<h3>Upload picture (.jpg, .png, .gif):</h3>
			<input type="file" name="img" accept="image/jpeg,image/png,image/gif" value="">

			<h3>Short description:</h3>
			<textarea type="text" name="desc-short" required>Type short description here (max.length 50)</textarea>
			<h3>Description continue:</h3>
			<textarea type="text" name="desc-full">Continue description (max.length 100)</textarea>
			<h3>Price:</h3>
			<input type="number" name="price" placeholder="12345" required>
			<h3>Health benefits (optional):</h3>
			<input type="text" name="health">
			<h3>Taste (optional):</h3>
			<input type="text" name="taste">
			<h3>Aroma (optional):</h3>
			<input type="text" name="aroma">
			<h3>Mouth (optional):</h3>
			<input type="text" name="mouth"><br>
			<input class="trigger" type="submit" name="submit" value="Submit">
		</form>
	</div>
</div>

