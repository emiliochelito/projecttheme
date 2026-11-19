import './menu.js';

class General {
	constructor() {
		this.testVariable = 'script working';
		this.init();
	}

	init() {
		// for tests purposes only
		console.log(this.testVariable);
	}
}

document.addEventListener('DOMContentLoaded', () => {
	new General();

	document.querySelectorAll('.upload-form__drop').forEach((dropZone) => {
		['dragenter', 'dragover'].forEach((eventName) => {
			dropZone.addEventListener(eventName, (event) => {
				event.preventDefault();
				dropZone.classList.add('is-dragging');
			});
		});

		dropZone.addEventListener('dragleave', () => {
			dropZone.classList.remove('is-dragging');
		});

		dropZone.addEventListener('drop', (event) => {
			event.preventDefault();
			dropZone.classList.remove('is-dragging');

			const input = dropZone.querySelector('.upload-form__input');
			if (input && event.dataTransfer?.files.length) {
				input.files = event.dataTransfer.files;
			}
		});
	});

	document.querySelectorAll('.genre-selector__select').forEach((select) => {
		const field = select.closest('.genre-selector__field');

		const updateState = () => {
			field?.classList.toggle('is-filled', Boolean(select.value));
		};

		select.addEventListener('change', updateState);
		updateState();
	});
});
