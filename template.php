<div class="finance-tracker-wrapper">

	<h4 class="current-money">Current Balance: <span>Loading</span></h4>

	<div class="buttons-wrapper">

		<button class="add-button">Add</button><br>
		<form class="details-form details-form-add" method="post">
			<input type="hidden" class="input-type" value="add">
			<input type="number" class="input-amount" placeholder="Amount" required><br><br>
			<textarea class="input-description" placeholder="Description" required></textarea><br>
			<button type="submit" class="submit-form">Submit</button>
		</form>

		<button class="minus-button">Minus</button><br>
		<form class="details-form details-form-minus">
			<input type="hidden" class="input-type" value="minus">
			<input type="number" class="input-amount" placeholder="Amount" required><br><br>
			<textarea class="input-description" placeholder="Description" required></textarea><br>
			<button class="submit-form">Submit</button>
		</form>

	</div>
	
</div>
<style>
.buttons-wrapper {
	max-width: 400px;
}
.buttons-wrapper input,
.buttons-wrapper button {
	width: 100%;
}
.buttons-wrapper > button {
	margin-bottom: 20px;
    height: 125px;
    font-size: 1.75rem;
}
.details-form + button {
    margin-top: 40px;
}
.details-form > button {
	background: #4f4f4f;
}
.details-form {
	margin-top: 21px;
	display: none;
}
</style>