//Animation for hide alert
const messageAnimate = () => {
	const alert = document.querySelector('.alert');
	setTimeout(() => {
		if(alert != null) {
			alert.textContent = "";
		}
	}, 1299);
	setTimeout(() => {
		if(alert != null) {
			alert.style.opacity = 0;
			alert.style.margin = 0;
			alert.style.padding = 0;
			alert.style.height = 0;
		}
	}, 1300);

	setTimeout(() => {
		if(alert != null) {
			alert.style.display = "none";
		}
	}, 2800);
}