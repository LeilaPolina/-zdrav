var show_other_indexes=false;
function create_index_object(name,val, date, border_kind, percent,lower_norm,upper_norm ) {
	var index_obj={};
	index_obj.name=name;
	index_obj.val=val;
	index_obj.date=date;
	index_obj.border_kind=border_kind;
	index_obj.percent=percent;
	index_obj.lower_norm=lower_norm;
	index_obj.upper_norm=upper_norm;
	return index_obj;
}
var indexes_array=[];

var main_indexes_names=["cholesterol","glucose","weight","upper_blood_pressure","lower_blood_pressure"];
var demo_indexes_names=["erythrocytes","hemoglobin","hematocrit","avg_erythrocytes","avg_hemoglobin_content_in_erythrocytes", "avg_hemoglobin_concentration_in_erythrocytes","color_index","reticulocytes","platelets","leucocytes","segment_nuclear_neutrophils","stab_neutrophils","myelocytes","meta_myelocytes","lymphocytes","monocytes","eosinophils","basophils","plasmocytes","ESR"];

function init_indexes_array() {
	for (i=0;i<main_indexes_names.length;i++) { 
		indexes_array[main_indexes_names[i]]=create_index_object(main_indexes_names[i],0,0,0,0,0);
	}
}

function add_demo_indexes_names() {
	for (var i=0;i<demo_indexes_names.length;i++) { 
		indexes_array[demo_indexes_names[i]]=create_index_object(demo_indexes_names[i],0,0,0,0,0);
	}
}
