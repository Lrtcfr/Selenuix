if (document.querySelector('#header__icon')) {
	document.querySelector('#header__icon').addEventListener('click', function(e) {
		
		e.preventDefault()

		document.querySelector('body').classList.toggle('width--sidebar')
	})
}