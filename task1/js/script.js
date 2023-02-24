let models = null;

fetch('/app/Controllers/IndexController.php')
	.then((res) => res.json())
	.then((response) => {
		const data = parseData(response);

		setData(data[0], data[1], data[2]);
	})
	.catch(error => console.log(error));


$(document).on('change', '#brand', function () {
	let options = document.querySelectorAll('#model option');
	options.forEach(option => option.remove());

	setModels(models);
});

$(document).ready(function () {
	$('#number').inputmask({ 'mask': '+375 (99) 999-99-99' });

	$('form').on('submit', function (event) {
		event.preventDefault();

		let data = createOrder();
		fetch('/app/Controllers/OrderController.php', {
			method: 'POST',
			body: data
		})
			.then((res) => res.json())
			.then((response) => {
				alert('Заказ успешно оформлен!')
			})
			.catch(error => console.log(error));
	});
});

function parseData(data) {
	let brands = data['brands'];
	let jsonModels = data['models'];
	let details = data['details'];

	brands = JSON.parse(brands);
	models = JSON.parse(jsonModels);
	details = JSON.parse(details);

	return [brands, models, details];
}

function setData(brands, models, details) {
	brands.forEach(brand => {
		let option = new Option(brand.brandName, brand.brandName);
		document.getElementById('brand').add(option, undefined);
	});

	setModels(models);

	details.forEach(detail => {
		let option = new Option(detail.detailName, detail.detailName);
		document.getElementById('detail').add(option, undefined);
	});
}

function setModels(models) {
	models.forEach(model => {
		let selectedBrand = document.getElementById('brand').value;
		if (model.brandName === selectedBrand) {
			let option = new Option(model.modelName, model.modelName);
			document.getElementById('model').add(option, undefined);
		}
	});
}

function createOrder() {
	let data = new FormData();

	const brand = document.getElementById('brand').value;
	const model = document.getElementById('model').value;
	const detail = document.getElementById('detail').value;
	const name = document.getElementById('name').value;
	const number = document.getElementById('number').value;

	data.append('clientName', name);
	data.append('clientNumber', number);
	data.append('brandName', brand);
	data.append('modelName', model);
	data.append('detailName', detail);

	return data
}