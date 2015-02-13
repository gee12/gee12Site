//////////////////////////////////////////////////////////////////////////////
// Для выбора из combobox
function showOption(el) {
	var option = el.options[el.selectedIndex].value;
	window.location.href = "?select=" + option;
}