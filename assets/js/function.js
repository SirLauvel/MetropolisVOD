// Switch
function switchFlex() {
  document.getElementById('flexContainer').classList.remove('hidden');
  document.getElementById('sliderContainer').classList.add('hidden');
}

function switchSlider() {
  document.getElementById('flexContainer').classList.add('hidden');
  document.getElementById('sliderContainer').classList.remove('hidden');
}

// Favorie 
function favorite($id_movie, $id_users) {
  $.ajax({
    type: "POST",
    url: 'assets/src/back/addFavorite.php',
    data: {
      action: 'btn_favorite',
      id_movie: $id_movie,
      id_users: $id_users
    }
  })
};

// Formulaire des films (Bouton)
function step_1() {
  document.getElementById('step_2').classList.add('hidden');
  document.getElementById('step_1').classList.remove('hidden');
  document.getElementById('container_previous').classList.add('hidden');
  document.getElementById('btnStep2_previous').classList.add('hidden');
  document.getElementById('btnStep2_next').classList.add('hidden');
  document.getElementById('btnStep1_next').classList.remove('hidden');
}

function step_2(btn) {
  if (btn.id == 'btnStep1_next') {
      document.getElementById('step_1').classList.add('hidden');
      document.getElementById('step_2').classList.remove('hidden');
      document.getElementById('container_previous').classList.remove('hidden');
      document.getElementById('btnStep1_next').classList.add('hidden');
      document.getElementById('btnStep2_previous').classList.remove('hidden');
      document.getElementById('btnStep2_next').classList.remove('hidden');

  }
  if (btn.id == 'btnStep3_previous') {
      document.getElementById('step_3').classList.add('hidden');
      document.getElementById('step_2').classList.remove('hidden');
      document.getElementById('btnStep3_previous').classList.add('hidden');
      document.getElementById('btnStep3_next').classList.add('hidden');
      document.getElementById('btnStep2_previous').classList.remove('hidden');
      document.getElementById('btnStep2_next').classList.remove('hidden');
  }
}
function step_3() {
  document.getElementById('step_2').classList.add('hidden');
  document.getElementById('step_3').classList.remove('hidden');
  document.getElementById('btnStep3_previous').classList.remove('hidden');
  document.getElementById('btnStep3_next').classList.remove('hidden');
  document.getElementById('btnStep2_previous').classList.add('hidden');
  document.getElementById('btnStep2_next').classList.add('hidden');
}

// Création de balise

function doInputActor(checkboxElem) {
  let name_actor = checkboxElem.id;
  let id_actor = checkboxElem.value;
  console.log(id_actor);

  if (checkboxElem.checked) {
      console.log(id_actor);

      let roleContent = document.getElementById('roleContent');

      let actorBox = document.createElement('div');
      actorBox.classList.add('flex', 'flex-col', 'sm:flex-row', 'gap-2');
      actorBox.id = "actorBox_" + id_actor;

      let actorChoice = document.createElement('h4');
      actorChoice.classList.add('text-lg', 'font-medium');
      actorChoice.innerHTML = name_actor;

      let roleInput = document.createElement('input');
      roleInput.classList.add('py-0', 'px-2', 'bg-gray-50', 'border', 'border-gray-300', 'text-gray-900', 'text-sm', 'rounded-lg', 'focus:ring-secondary', 'focus:border-secondary', 'block', 'flex', 'justify-between', 'items-center');
      roleInput.setAttribute('type', 'text');
      roleInput.setAttribute('name', 'role_actor[]');
      roleInput.setAttribute('id', 'role');

      actorBox.appendChild(actorChoice);
      actorBox.appendChild(roleInput);
      roleContent.appendChild(actorBox);

  } else {
      document.getElementById('actorBox_' + id_actor).remove();
  }
}

function doInputProducer(checkboxElem) {
  let name_producer = checkboxElem.id;
  let id_producer = checkboxElem.value;

  if (checkboxElem.checked) {
      let producerContent = document.getElementById('producerContent');

      let producerChoice = document.createElement('li');
      producerChoice.innerHTML = name_producer;
      producerChoice.id = "producerBox_" + id_producer;


      producerContent.appendChild(producerChoice);

  } else {
      document.getElementById('producerBox_' + id_producer).remove();
  }
}

function doInputRealisator(checkboxElem) {
  let name_realisator = checkboxElem.id;
  let id_realisator = checkboxElem.value;

  if (checkboxElem.checked) {
      let realisatorContent = document.getElementById('realisatorContent');

      let realisatorChoice = document.createElement('li');
      realisatorChoice.innerHTML = name_realisator;
      realisatorChoice.id = "realisatorBox_" + id_realisator;


      realisatorContent.appendChild(realisatorChoice);

  } else {
      document.getElementById('realisatorBox_' + id_realisator).remove();
  }
}

function doInputCategory(checkboxElem) {
  let name_category = checkboxElem.id;
  let id_category = checkboxElem.value;

  if (checkboxElem.checked) {
      let categoryContent = document.getElementById('categoryContent');

      let categoryChoice = document.createElement('p');
      categoryChoice.textContent = name_category + ',';
      categoryChoice.id = "categoryBox_" + id_category;

      categoryContent.appendChild(categoryChoice);

  } else {
      document.getElementById('categoryBox_' + id_category).remove();
  }
}