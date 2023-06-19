let count = 0;
const selectSubject = document.getElementById('subject_id'+count+'');
selectSubject?.addEventListener('change', getValueSelection);

const selectSection = document.getElementById('section_id'+count+'');
const addContent = document.getElementById('addOthers');

const btnAdd = document.getElementById('buttomAdd');
btnAdd?.addEventListener('onclick', addMoreSubjects);

//Funcion principal para obtener valor de la materias y filtrar sus secciones;
function getValueSelection(){
    const subjectValue = selectSubject.value;
    const index = subjectValue-1;
    clearSections(selectSection); 
    generateOptions(index);
}

//genera las opciones a raiz del elemento seleccionado con el index;
function generateOptions(index){
    let subject = subjects[index].sections;
    subject.forEach(section => {
        const optionSection = document.createElement("OPTION");
        optionSection.value = section.letter;
        optionSection.textContent = section.letter;
        selectSection.appendChild(optionSection);
    });
}
//borra las opciones del select, dejando el select en blanco;
function clearSections(index){
    selectSection.innerHTML = "";
}

//Funcion principal para agregar mas materias
function addMoreSubjects(){
    count++;
    addContent.insertAdjacentHTML('beforeend', creatingHtml() );
    console.log(addContent);
}
//Crea opciones para el select de las materias cuando se le da clic para agregar mas materias;
function optionSubjects(){

    let htmlOption = '';

    subjects.forEach(subject => {
        htmlOption += '<option value='+subject.id+'>'+subject.name+'</option>';
    })

    return htmlOption;
}

//Repite el formulario;
function creatingHtml(){

    let repeatHtml = '<div><label for="subject_id'+count+'" class="form-label">Asignar Materia</label><select name="subject_id['+count+']" id="subject_id'+count+'" class="form-control" required >';
    repeatHtml += ''+getValueSelection()+'<option disabled selected>Seleccione una opcion...</option></select></div>';

    repeatHtml += '<div><label for="section_id'+count+'" class="form-label">Elegir Seccion</label><select name="section_id['+count+']" id="section_id'+count+'" class="form-control" required></select></div>';

    return repeatHtml;
}
    


    
    
        
    


