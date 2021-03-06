DROP TABLE IF EXISTS histories;
DROP TABLE IF EXISTS histories_aa;		
CREATE TABLE histories(
id INT AUTO_INCREMENT,
historydate DATETIME DEFAULT NULL,
id_empresa INT DEFAULT NULL,
id_patient INT DEFAULT NULL,
id_medico INT DEFAULT NULL,
id_appointment INT UNIQUE DEFAULT NULL,
am_desc VARCHAR(500) DEFAULT NULL,
ana_motcon VARCHAR(500) DEFAULT NULL,
ana_enferact VARCHAR(500) DEFAULT NULL,
av_tiplen VARCHAR(50) DEFAULT NULL,
av_color VARCHAR(50) DEFAULT NULL,
av_filtro VARCHAR(50) DEFAULT NULL,
av_usolen VARCHAR(50) DEFAULT NULL,
av_esfera_oi DECIMAL(5,2) DEFAULT NULL,
av_esfera_od DECIMAL(5,2) DEFAULT NULL,
av_cilindro_oi DECIMAL(5,2) DEFAULT NULL,
av_cilindro_od DECIMAL(5,2) DEFAULT NULL,
av_eje_oi DECIMAL(5,2) DEFAULT NULL,
av_eje_od DECIMAL(5,2) DEFAULT NULL,
av_prisma_oi TINYINT DEFAULT NULL,
av_prisma_od TINYINT DEFAULT NULL,
av_base_oi TINYINT DEFAULT NULL,
av_base_od TINYINT DEFAULT NULL,
av_avc_cc_oi TINYINT DEFAULT NULL,
av_avc_cc_od TINYINT DEFAULT NULL,
av_avc_sc_oi TINYINT DEFAULT NULL,
av_avc_sc_od TINYINT DEFAULT NULL,
av_avl_cc_oi TINYINT DEFAULT NULL,
av_avl_cc_od TINYINT DEFAULT NULL,
av_avl_sc_oi TINYINT DEFAULT NULL,
av_avl_sc_od TINYINT DEFAULT NULL,
av_avph_oi TINYINT DEFAULT NULL,
av_avph_od TINYINT DEFAULT NULL,
av_estforhab_cc_oi TINYINT DEFAULT NULL,
av_estforhab_cc_od TINYINT DEFAULT NULL,
av_estforhab_sc_oi TINYINT DEFAULT NULL,
av_estforhab_sc_od TINYINT DEFAULT NULL,
av_estforhab_lej_cc_oi TINYINT DEFAULT NULL,
av_estforhab_lej_cc_od TINYINT DEFAULT NULL,
av_estforhab_lej_sc_oi TINYINT DEFAULT NULL,
av_estforhab_lej_sc_od TINYINT DEFAULT NULL,
av_ojodom VARCHAR(20) DEFAULT NULL,
av_manodom VARCHAR(20) DEFAULT NULL,
av_angkap_oi CHAR(1) DEFAULT NULL,
av_angkap_od CHAR(1) DEFAULT NULL,
av_ppc_or TINYINT DEFAULT NULL,
av_ppc_sf TINYINT DEFAULT NULL,
av_fija_oi TINYINT DEFAULT NULL,
av_fija_od TINYINT DEFAULT NULL,
av_ctest_lej VARCHAR(100) DEFAULT NULL,
av_ctest_cer VARCHAR(100) DEFAULT NULL,
av_distint TINYINT DEFAULT NULL,
av_obser VARCHAR(100) DEFAULT NULL,
fo_ofmeri1_oi TINYINT DEFAULT NULL,
fo_ofmeri1_od TINYINT DEFAULT NULL,
fo_ofmeri2_oi TINYINT DEFAULT NULL,
fo_ofmeri2_od TINYINT DEFAULT NULL,
fo_ofeje_oi TINYINT DEFAULT NULL,
fo_ofeje_od TINYINT DEFAULT NULL,
fo_ofobser_oi VARCHAR(500) DEFAULT NULL,
fo_ofobser_od VARCHAR(500) DEFAULT NULL,
fo_rettecusa VARCHAR(100) DEFAULT NULL,
fo_retesf_oi DECIMAL(5,2) DEFAULT NULL,
fo_retesf_od DECIMAL(5,2) DEFAULT NULL,
fo_retcil_oi TINYINT DEFAULT NULL,
fo_retcil_od TINYINT DEFAULT NULL,
fo_reteje_oi TINYINT DEFAULT NULL,
fo_reteje_od TINYINT DEFAULT NULL,
fo_retcomp_oi VARCHAR(100) DEFAULT NULL,
fo_retcomp_od VARCHAR(100) DEFAULT NULL,
fo_retobserv_oi VARCHAR(500) DEFAULT NULL,
fo_retobserv_od VARCHAR(500) DEFAULT NULL,
fo_tsubesf_oi TINYINT DEFAULT NULL,
fo_tsubesf_od TINYINT DEFAULT NULL,
fo_tsubcil_oi DECIMAL(5,2) DEFAULT NULL,
fo_tsubcil_od DECIMAL(5,2) DEFAULT NULL,
fo_tsubeje_oi TINYINT DEFAULT NULL,
fo_tsubeje_od TINYINT DEFAULT NULL,
fo_tsubpris_oi TINYINT DEFAULT NULL,
fo_tsubpris_od TINYINT DEFAULT NULL,
fo_tsubbase_oi TINYINT DEFAULT NULL,
fo_tsubbase_od TINYINT DEFAULT NULL,
fo_tsubadd_oi TINYINT DEFAULT NULL,
fo_tsubadd_od TINYINT DEFAULT NULL,
fo_tsubavc_vl_oi VARCHAR(10) DEFAULT NULL,
fo_tsubavc_vl_od VARCHAR(10) DEFAULT NULL,
fo_tsubavc_vp_oi VARCHAR(10) DEFAULT NULL,
fo_tsubavc_vp_od VARCHAR(10) DEFAULT NULL,
mo_lucesw VARCHAR(50) DEFAULT NULL,
mo_dist VARCHAR(50) DEFAULT NULL,
mo_ojosuprime VARCHAR(50) DEFAULT NULL,
mo_bagolini VARCHAR(50) DEFAULT NULL,
mo_cosen_cer VARCHAR(50) DEFAULT NULL,
mo_cosen_lej VARCHAR(50) DEFAULT NULL,
mo_esttest VARCHAR(50) DEFAULT NULL,
mo_estrfnv_vl VARCHAR(10) DEFAULT NULL,
mo_estrfnv_vp VARCHAR(10) DEFAULT NULL,
mo_estrfp_vl VARCHAR(10) DEFAULT NULL,
mo_estrfp_vp VARCHAR(10) DEFAULT NULL,
mo_estnivvis_oi VARCHAR(10) DEFAULT NULL,
mo_estnivvis_od VARCHAR(10) DEFAULT NULL,
mo_esttecnica VARCHAR(500) DEFAULT NULL,
mo_estflex_oi VARCHAR(10) DEFAULT NULL,
mo_estflex_od VARCHAR(10) DEFAULT NULL,
diag_principal VARCHAR(100) DEFAULT NULL,
diag_rel_1 VARCHAR(100) DEFAULT NULL,
diag_rel_2 VARCHAR(100) DEFAULT NULL,
diag_rel_3 VARCHAR(100) DEFAULT NULL,
diag_compli VARCHAR(100) DEFAULT NULL,
diag_finconsul VARCHAR(100) DEFAULT NULL,
state CHAR(2) DEFAULT 'AC',
created_user VARCHAR(20) DEFAULT NULL,
updated_user VARCHAR(20) DEFAULT NULL,
created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP() ON UPDATE CURRENT_TIMESTAMP(),
deleted_at TIMESTAMP NULL DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=INNODB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;




CREATE TABLE histories_aa(
id INT AUTO_INCREMENT,
id_histories INT UNIQUE,
mo_est_aavl_oi_1 VARCHAR(50) DEFAULT NULL,
mo_est_aavl_oi_2 VARCHAR(50) DEFAULT NULL,
mo_est_aavl_oi_3 VARCHAR(50) DEFAULT NULL,
mo_est_aavl_oi_4 VARCHAR(50) DEFAULT NULL,
mo_est_aavl_oi_5 VARCHAR(50) DEFAULT NULL,
mo_est_aavl_oi_6 VARCHAR(50) DEFAULT NULL,
mo_est_aavl_oi_7 VARCHAR(50) DEFAULT NULL,
mo_est_aavl_oi_8 VARCHAR(50) DEFAULT NULL,
mo_est_aavl_oi_9 VARCHAR(50) DEFAULT NULL,
mo_est_aavl_od_1 VARCHAR(50) DEFAULT NULL,
mo_est_aavl_od_2 VARCHAR(50) DEFAULT NULL,
mo_est_aavl_od_3 VARCHAR(50) DEFAULT NULL,
mo_est_aavl_od_4 VARCHAR(50) DEFAULT NULL,
mo_est_aavl_od_5 VARCHAR(50) DEFAULT NULL,
mo_est_aavl_od_6 VARCHAR(50) DEFAULT NULL,
mo_est_aavl_od_7 VARCHAR(50) DEFAULT NULL,
mo_est_aavl_od_8 VARCHAR(50) DEFAULT NULL,
mo_est_aavl_od_9 VARCHAR(50) DEFAULT NULL,
mo_est_aavp_oi_1 VARCHAR(50) DEFAULT NULL,
mo_est_aavp_oi_2 VARCHAR(50) DEFAULT NULL,
mo_est_aavp_oi_3 VARCHAR(50) DEFAULT NULL,
mo_est_aavp_oi_4 VARCHAR(50) DEFAULT NULL,
mo_est_aavp_oi_5 VARCHAR(50) DEFAULT NULL,
mo_est_aavp_oi_6 VARCHAR(50) DEFAULT NULL,
mo_est_aavp_oi_7 VARCHAR(50) DEFAULT NULL,
mo_est_aavp_oi_8 VARCHAR(50) DEFAULT NULL,
mo_est_aavp_oi_9 VARCHAR(50) DEFAULT NULL,
mo_est_aavp_od_1 VARCHAR(50) DEFAULT NULL,
mo_est_aavp_od_2 VARCHAR(50) DEFAULT NULL,
mo_est_aavp_od_3 VARCHAR(50) DEFAULT NULL,
mo_est_aavp_od_4 VARCHAR(50) DEFAULT NULL,
mo_est_aavp_od_5 VARCHAR(50) DEFAULT NULL,
mo_est_aavp_od_6 VARCHAR(50) DEFAULT NULL,
mo_est_aavp_od_7 VARCHAR(50) DEFAULT NULL,
mo_est_aavp_od_8 VARCHAR(50) DEFAULT NULL,
mo_est_aavp_od_9 VARCHAR(50) DEFAULT NULL,
created_user VARCHAR(20) DEFAULT NULL,
updated_user VARCHAR(20) DEFAULT NULL,
created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP() ON UPDATE CURRENT_TIMESTAMP(),
deleted_at TIMESTAMP NULL DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=INNODB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;