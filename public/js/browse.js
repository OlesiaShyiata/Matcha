//——————————————————————————————————//
//          xeee      .--~*teu.     //
//         d888R     dF     988Nx   //
//        d8888R    d888b   `8888>  //
//       @ 8888R    ?8888>  98888F  //
//     .P  8888R     "**"  x88888~  //
//    :F   8888R          d8888*`   //
//   x"    8888R        z8**"`   :  //
//  d8eeeee88888eer   :?.....  ..F  //
//         8888R     <""888888888~  //
//         8888R     8:  "888888*   //
//      "*%%%%%%**~  ""    "**"`    //
//——————————————————————————————————//

let resultsContainer = document.getElementById('resultsContainer');
let ownLongitude;
let ownLatitude;
let ownTags = [];
let cards = [];
let constraints = {
	minAge : 18, // Let's play it safe and assume the site isn't suitable for minors
	maxAge : 116, // The oldest known person alive is 116 years old
	reqTags : 'n'
};

const fillOptions = () => {
	for (var i = 18; i <= 116; i++) {
		$('#minAge').append(`<option value="${i}">${i}</option>`);
		$('#maxAge').append(`<option value="${i}">${i}</option>`);
	}
}

const getOwnData = () => {
	$.ajax({
		url: '/browse/getowndata',
		type: 'get',
		success: response => {
			responseObj = JSON.parse(response);
			ownLongitude = responseObj.longitude;
			ownLatitude = responseObj.latitude;
			ownTags = responseObj.tags;
			console.log('Longitude: ', ownLongitude)
			console.log('Latitude: ', ownLatitude)
			console.log('Tags: ', ownTags)
		}
	})
}

/* I know this creates hella load and makes transaction time
   super long, but the deadlines are too close */
const getUserGallery = () => {
	$.ajax({
		url: '/browse/getusers',
		type: 'get',
		success: response => {
			responseObj = JSON.parse(response);
			Object.values(responseObj).forEach(profile =>{
				console.log(profile);
				let card = document.createElement('div');
				card.setAttribute('class', 'card mb-4');

				let avatar = document.createElement('img');
				avatar.setAttribute('class', 'card-img-top');
				avatar.setAttribute('src', profile.avatar);
				card.appendChild(avatar);

				let cb = document.createElement('div');
				cb.setAttribute('class', 'card-body collapse');
				card.appendChild(cb);

				let name = document.createElement('h5');
				name.setAttribute('class', 'card-title');
				name.innerText = `${profile.firstName} ${profile.lastName}`;
				cb.appendChild(name);

				let bio = document.createElement('p');
				bio.setAttribute('class', 'card-text');
				bio.innerText = profile.bio;
				cb.appendChild(bio);

				let details = document.createElement('ul');
				details.setAttribute('class', 'list-group list-group-flush collapse');
				card.appendChild(details);

				let age = document.createElement('li');
				age.setAttribute('class', 'list-group-item');
				age.innerText = `Age: ${profile.age}`;
				details.appendChild(age);

				let rating = document.createElement('li');
				rating.setAttribute('class', 'list-group-item');
				rating.innerText = `Rating: ${profile.rating}`;
				details.appendChild(rating);

				let location = document.createElement('li');
				location.setAttribute('class', 'list-group-item');
				location.innerText = `Age: ${profile.location}`;
				details.appendChild(location);

				let interests = document.createElement('li');
				interests.setAttribute('class', 'list-group-item');
				interests.innerText = 'Interests: ';
				Object.values(profile.tags).forEach(tag => {
					interests.innerHTML += `${tag} <br />`
				});
				details.appendChild(interests);

				let footer = document.createElement('div');
				footer.setAttribute('class', 'card-footer text-center');
				card.appendChild(footer);

				let viewProfBtn = document.createElement('a');
				viewProfBtn.setAttribute('class', 'btn btn-primary');
				viewProfBtn.setAttribute('href', `/user/${profile.userID}`);
				viewProfBtn.innerText = 'View profile';
				footer.appendChild(viewProfBtn);

				avatar.onclick = () => {
					$(cb).toggle('slow');
					$(details).toggle('slow');
				}
				card.profile = profile;
				cards.push(card);
				resultsContainer.appendChild(card);
			});
			console.log(cards);
		}
	})
}

// I repeat myself a lot here, redo this with array & callback using "this"
const setFilterControl = () => {
	$('#minAge').change(() => {
		constraints.minAge = $('#minAge').children('option:selected').val();
		filterResults();
	});
	$('#maxAge').change(() => {
		constraints.maxAge = $('#maxAge').children('option:selected').val();
		filterResults();
	});
	$('#minDist').blur(() => {
		constraints.minDist = $('#minDist').val();
		filterResults();
	})
	$('#maxDist').blur(() => {
		constraints.maxDist = $('#maxDist').val();
		filterResults();
	})
	$('#minRate').blur(() => {
		constraints.minRate = $('#minRate').val();
		filterResults();
	})
	$('#maxRate').blur(() => {
		constraints.maxRate = $('#maxRate').val();
		filterResults();
	})
	$('#reqTags').change(event => {
		if(event.target.checked)
			constraints.reqTags = 'y';
		else
			constraints.reqTags = 'n';
		filterResults();
	})
}

const filterResults = () => {
	console.log(constraints);
}

$(document).ready(() => {
	fillOptions();
	getOwnData();
	getUserGallery();
	setFilterControl();
});