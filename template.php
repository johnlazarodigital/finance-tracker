<div class="finance-tracker-wrapper">

	<div class="buttons-wrapper">

		<button class="add-button">Add</button>
			<form class="details-form details-form-add">
			<input type="text" class="input-type" value="add"><br>
			<input type="text" class="input-amount" placeholder="Amount"><br>
			<textarea class="input-description" placeholder="Description"></textarea><br>
			<button class="submit-form">Submit</button>
		</form>

		<br>

		<button class="minus-button">Minus</button>
		<form class="details-form details-form-minus">
			<input type="text" class="input-type" value="add"><br>
			<input type="text" class="input-amount" placeholder="Amount"><br>
			<textarea class="input-description" placeholder="Description"></textarea><br>
			<button class="submit-form">Submit</button>
		</form>

	</div>

	<!-- id, description, amount, amount_after, date_created -->
	
</div>
<style>
.buttons-wrapper {
	max-width: 400px;
}
.buttons-wrapper button {
	width: 100%;
}
.details-form {
	display: none;
}
</style>