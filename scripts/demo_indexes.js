
function fill_demo_values(){
	indexes_array['weight'].val = 80;
	indexes_array['weight'].date = "2018-07-01";
	indexes_array['weight'].border_kind = 1;
	indexes_array['weight'].percent = 0;
	indexes_array['weight'].lower_norm = 65;
	indexes_array['weight'].upper_norm = 81;
	set_values(indexes_array['weight'].name, indexes_array['weight'].val, indexes_array['weight'].date, indexes_array['weight'].border_kind);
	
	indexes_array['cholesterol'].val = 6;
	indexes_array['cholesterol'].date = "2018-07-01";
	indexes_array['cholesterol'].border_kind = 2;
	indexes_array['cholesterol'].percent = 4.35;
	indexes_array['cholesterol'].lower_norm = 3.32;
	indexes_array['cholesterol'].upper_norm = 5.75;
	set_values(indexes_array['cholesterol'].name, indexes_array['cholesterol'].val, indexes_array['cholesterol'].date, indexes_array['cholesterol'].border_kind);

	indexes_array['glucose'].val = 4.3;
	indexes_array['glucose'].date = "2018-07-01";
	indexes_array['glucose'].border_kind = 0;
	indexes_array['glucose'].percent = 0;
	indexes_array['glucose'].lower_norm = 3.3;
	indexes_array['glucose'].upper_norm = 5.5;
	set_values(indexes_array['glucose'].name, indexes_array['glucose'].val, indexes_array['glucose'].date, indexes_array['glucose'].border_kind);
	
	indexes_array['upper_blood_pressure'].val = 130;
	indexes_array['upper_blood_pressure'].date = "2018-07-01";
	indexes_array['upper_blood_pressure'].border_kind = 0;
	indexes_array['upper_blood_pressure'].percent = 0;
	indexes_array['upper_blood_pressure'].lower_norm = 120;
	indexes_array['upper_blood_pressure'].upper_norm = 140;

	indexes_array['lower_blood_pressure'].val = 80;
	indexes_array['lower_blood_pressure'].date = "2018-07-01";
	indexes_array['lower_blood_pressure'].border_kind = 0;
	indexes_array['lower_blood_pressure'].percent = 0;
	indexes_array['lower_blood_pressure'].lower_norm = 70;
	indexes_array['lower_blood_pressure'].upper_norm = 90;
	
	set_blood_pressure_values(indexes_array['upper_blood_pressure'].val, indexes_array['lower_blood_pressure'].val, indexes_array['upper_blood_pressure'].date, indexes_array["upper_blood_pressure"].border_kind, indexes_array["lower_blood_pressure"].border_kind);
}


function fill_other_indexes_values() {
	add_demo_indexes_names();
	indexes_array['erythrocytes'].val = 5.8;
	indexes_array['erythrocytes'].date = "2018-07-01";
	indexes_array['erythrocytes'].border_kind = 2;
	indexes_array['erythrocytes'].percent = 0;
	indexes_array['erythrocytes'].lower_norm = 3.8;
	indexes_array['erythrocytes'].upper_norm = 5.3;
	set_values(indexes_array['erythrocytes'].name, indexes_array['erythrocytes'].val, indexes_array['erythrocytes'].date, indexes_array['erythrocytes'].border_kind);
	
	indexes_array['hemoglobin'].val = 110.0;
	indexes_array['hemoglobin'].date = "2018-07-01";
	indexes_array['hemoglobin'].border_kind = -2;
	indexes_array['hemoglobin'].percent = 0;
	indexes_array['hemoglobin'].lower_norm = 115.0;
	indexes_array['hemoglobin'].upper_norm = 150.0;
	set_values(indexes_array['hemoglobin'].name, indexes_array['hemoglobin'].val, indexes_array['hemoglobin'].date, indexes_array['hemoglobin'].border_kind);
	
	indexes_array['hematocrit'].val = 41.0;
	indexes_array['hematocrit'].date = "2018-07-01";
	indexes_array['hematocrit'].border_kind = 1;
	indexes_array['hematocrit'].percent = 0;
	indexes_array['hematocrit'].lower_norm = 34.0;
	indexes_array['hematocrit'].upper_norm = 42.0;
	set_values(indexes_array['hematocrit'].name, indexes_array['hematocrit'].val, indexes_array['hematocrit'].date, indexes_array['hematocrit'].border_kind);
	
	indexes_array['avg_erythrocytes'].val = 90.0;
	indexes_array['avg_erythrocytes'].date = "2018-07-01";
	indexes_array['avg_erythrocytes'].border_kind = 0;
	indexes_array['avg_erythrocytes'].percent = 0;
	indexes_array['avg_erythrocytes'].lower_norm = 77.0;
	indexes_array['avg_erythrocytes'].upper_norm = 95.0;
	set_values(indexes_array['avg_erythrocytes'].name, indexes_array['avg_erythrocytes'].val, indexes_array['avg_erythrocytes'].date, indexes_array['avg_erythrocytes'].border_kind);
	
	indexes_array['avg_hemoglobin_content_in_erythrocytes'].val = 30.0;
	indexes_array['avg_hemoglobin_content_in_erythrocytes'].date = "2018-07-01";
	indexes_array['avg_hemoglobin_content_in_erythrocytes'].border_kind = 0;
	indexes_array['avg_hemoglobin_content_in_erythrocytes'].percent = 0;
	indexes_array['avg_hemoglobin_content_in_erythrocytes'].lower_norm = 25.0;
	indexes_array['avg_hemoglobin_content_in_erythrocytes'].upper_norm = 33.0;
	set_values(indexes_array['avg_hemoglobin_content_in_erythrocytes'].name, indexes_array['avg_hemoglobin_content_in_erythrocytes'].val, indexes_array['avg_hemoglobin_content_in_erythrocytes'].date, indexes_array['avg_hemoglobin_content_in_erythrocytes'].border_kind);
	
	indexes_array['avg_hemoglobin_concentration_in_erythrocytes'].val = 35.0;
	indexes_array['avg_hemoglobin_concentration_in_erythrocytes'].date = "2018-07-01";
	indexes_array['avg_hemoglobin_concentration_in_erythrocytes'].border_kind = 0;
	indexes_array['avg_hemoglobin_concentration_in_erythrocytes'].percent = 0;
	indexes_array['avg_hemoglobin_concentration_in_erythrocytes'].lower_norm = 31.0;
	indexes_array['avg_hemoglobin_concentration_in_erythrocytes'].upper_norm = 36.0;
	set_values(indexes_array['avg_hemoglobin_concentration_in_erythrocytes'].name, indexes_array['avg_hemoglobin_concentration_in_erythrocytes'].val, indexes_array['avg_hemoglobin_concentration_in_erythrocytes'].date, indexes_array['avg_hemoglobin_concentration_in_erythrocytes'].border_kind);

	indexes_array['color_index'].val = 1.0;
	indexes_array['color_index'].date = "2018-07-01";
	indexes_array['color_index'].border_kind = 0;
	indexes_array['color_index'].percent = 0;
	indexes_array['color_index'].lower_norm = 0.1;
	indexes_array['color_index'].upper_norm = 1.1;
	set_values(indexes_array['color_index'].name, indexes_array['color_index'].val, indexes_array['color_index'].date, indexes_array['color_index'].border_kind);
	
	indexes_array['reticulocytes'].val = 1.2;
	indexes_array['reticulocytes'].date = "2018-07-01";
	indexes_array['reticulocytes'].border_kind = 0;
	indexes_array['reticulocytes'].percent = 0;
	indexes_array['reticulocytes'].lower_norm = 0.3;
	indexes_array['reticulocytes'].upper_norm = 1.5;
	set_values(indexes_array['reticulocytes'].name, indexes_array['reticulocytes'].val, indexes_array['reticulocytes'].date, indexes_array['reticulocytes'].border_kind);
	
	indexes_array['platelets'].val = 445.0;
	indexes_array['platelets'].date = "2018-07-01";
	indexes_array['platelets'].border_kind = 0;
	indexes_array['platelets'].percent = 0;
	indexes_array['platelets'].lower_norm = 150.0;
	indexes_array['platelets'].upper_norm = 500.0;
	set_values(indexes_array['platelets'].name, indexes_array['platelets'].val, indexes_array['platelets'].date, indexes_array['platelets'].border_kind);

	indexes_array['leucocytes'].val = 11.2;
	indexes_array['leucocytes'].date = "2018-07-01";
	indexes_array['leucocytes'].border_kind = 0;
	indexes_array['leucocytes'].percent = 0;
	indexes_array['leucocytes'].lower_norm = 5.0;
	indexes_array['leucocytes'].upper_norm = 14.5;
	set_values(indexes_array['leucocytes'].name, indexes_array['leucocytes'].val, indexes_array['leucocytes'].date, indexes_array['leucocytes'].border_kind);
	
	indexes_array['segment_nuclear_neutrophils'].val = 54.0;
	indexes_array['segment_nuclear_neutrophils'].date = "2018-07-01";
	indexes_array['segment_nuclear_neutrophils'].border_kind = 0;
	indexes_array['segment_nuclear_neutrophils'].percent = 0;
	indexes_array['segment_nuclear_neutrophils'].lower_norm = 35.0;
	indexes_array['segment_nuclear_neutrophils'].upper_norm = 58.0;
	set_values(indexes_array['segment_nuclear_neutrophils'].name, indexes_array['segment_nuclear_neutrophils'].val, indexes_array['segment_nuclear_neutrophils'].date, indexes_array['segment_nuclear_neutrophils'].border_kind);
	
	indexes_array['stab_neutrophils'].val = 0.0;
	indexes_array['stab_neutrophils'].date = "2018-07-01";
	indexes_array['stab_neutrophils'].border_kind = 0;
	indexes_array['stab_neutrophils'].percent = 0;
	indexes_array['stab_neutrophils'].lower_norm = 0.0001;
	indexes_array['stab_neutrophils'].upper_norm = 0.5;
	set_values(indexes_array['stab_neutrophils'].name, indexes_array['stab_neutrophils'].val, indexes_array['stab_neutrophils'].date, indexes_array['stab_neutrophils'].border_kind);
	
	indexes_array['myelocytes'].val = 0.0;
	indexes_array['myelocytes'].date = "2018-07-01";
	indexes_array['myelocytes'].border_kind = 0;
	indexes_array['myelocytes'].percent = 0;
	indexes_array['myelocytes'].lower_norm = 0.0001;
	indexes_array['myelocytes'].upper_norm = 0.0001;
	set_values(indexes_array['myelocytes'].name, indexes_array['myelocytes'].val, indexes_array['myelocytes'].date, indexes_array['myelocytes'].border_kind);
	
	indexes_array['meta_myelocytes'].val = 0.0;
	indexes_array['meta_myelocytes'].date = "2018-07-01";
	indexes_array['meta_myelocytes'].border_kind = 0;
	indexes_array['meta_myelocytes'].percent = 0;
	indexes_array['meta_myelocytes'].lower_norm = 0.0001;
	indexes_array['meta_myelocytes'].upper_norm = 0.0001;
	set_values(indexes_array['meta_myelocytes'].name, indexes_array['meta_myelocytes'].val, indexes_array['meta_myelocytes'].date, indexes_array['meta_myelocytes'].border_kind);
	
	indexes_array['lymphocytes'].val = 31.0;
	indexes_array['lymphocytes'].date = "2018-07-01";
	indexes_array['lymphocytes'].border_kind = 0;
	indexes_array['lymphocytes'].percent = 0;
	indexes_array['lymphocytes'].lower_norm = 30.0;
	indexes_array['lymphocytes'].upper_norm = 55.0;
	set_values(indexes_array['lymphocytes'].name, indexes_array['lymphocytes'].val, indexes_array['lymphocytes'].date, indexes_array['lymphocytes'].border_kind);

	indexes_array['monocytes'].val = 9.0;
	indexes_array['monocytes'].date = "2018-07-01";
	indexes_array['monocytes'].border_kind = 0;
	indexes_array['monocytes'].percent = 0;
	indexes_array['monocytes'].lower_norm = 2.0;
	indexes_array['monocytes'].upper_norm = 10.0;
	set_values(indexes_array['monocytes'].name, indexes_array['monocytes'].val, indexes_array['monocytes'].date, indexes_array['monocytes'].border_kind);
	
	indexes_array['eosinophils'].val = 4.0;
	indexes_array['eosinophils'].date = "2018-07-01";
	indexes_array['eosinophils'].border_kind = 0;
	indexes_array['eosinophils'].percent = 0;
	indexes_array['eosinophils'].lower_norm = 0.5;
	indexes_array['eosinophils'].upper_norm = 5.0;
	set_values(indexes_array['eosinophils'].name, indexes_array['eosinophils'].val, indexes_array['eosinophils'].date, indexes_array['eosinophils'].border_kind);
	
	indexes_array['basophils'].val = 0.0;
	indexes_array['basophils'].date = "2018-07-01";
	indexes_array['basophils'].border_kind = 0;
	indexes_array['basophils'].percent = 0;
	indexes_array['basophils'].lower_norm = 0.0001;
	indexes_array['basophils'].upper_norm = 1.0;
	set_values(indexes_array['basophils'].name, indexes_array['basophils'].val, indexes_array['basophils'].date, indexes_array['basophils'].border_kind);
	
	indexes_array['plasmocytes'].val = 1.0;
	indexes_array['plasmocytes'].date = "2018-07-01";
	indexes_array['plasmocytes'].border_kind = 0;
	indexes_array['plasmocytes'].percent = 0;
	indexes_array['plasmocytes'].lower_norm = 0.0001;
	indexes_array['plasmocytes'].upper_norm = 1.0;
	set_values(indexes_array['plasmocytes'].name, indexes_array['plasmocytes'].val, indexes_array['plasmocytes'].date, indexes_array['plasmocytes'].border_kind);
	
	indexes_array['ESR'].val = 11.0;
	indexes_array['ESR'].date = "2018-07-01";
	indexes_array['ESR'].border_kind = 0;
	indexes_array['ESR'].percent = 0;
	indexes_array['ESR'].lower_norm = 2.0;
	indexes_array['ESR'].upper_norm = 12.0;
	set_values(indexes_array['ESR'].name, indexes_array['ESR'].val, indexes_array['ESR'].date, indexes_array['ESR'].border_kind);


}