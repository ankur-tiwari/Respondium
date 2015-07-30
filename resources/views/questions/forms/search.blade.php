<form id="search_form" v-on="submit: search">
	<div class="form-group">
		<input type="search" name="query" class="form-control input-bg" placeholder="Search for questions..." v-model="searchInput">
	</div>
</form>
