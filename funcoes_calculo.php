<?php

    function Calculo_ABV($OG,$FG){
        if ($OG > $FG) {
            $ABV = 131.25 * ($OG - $FG);
            return $ABV;
        }
        else{
            $ABV = 0;
        }
    }


// ___________________________________________________________________________________________________________________________________________________________________________________________________________
// ---------------------------INICIO SRM/EBC------------------------------------------------------------------------------------------------------------------------------------------------------------------
//____________________________________________________________________________________________________________________________________________________________________________________________________________

    function Cor_SRM($SRM_aproximado){
        $SRM_hex=''; //coloca a cor em hexadecimal
        switch ($SRM_aproximado) {
        case '1':
            $SRM_hex="#fee799";
            break;

        case '2':
            $SRM_hex="#fdd978";
            break;

        case '3':
            $SRM_hex="#fdcb5a";
            break;

        case '4':
            $SRM_hex="#fdcb5a";
            break;

        case '5':
            $SRM_hex="#f7b324";
            break;

        case '6':
            $SRM_hex="#f5a800";
            break;

        case '7':
            $SRM_hex="#ee9e01";
            break;

        case '8':
            $SRM_hex="#e69100";
            break;

        case '9':
            $SRM_hex="#e28800";
            break;

        case '10':
            $SRM_hex="#da7e01";
            break;

        case '11':
            $SRM_hex="#d37400";
            break;

        case '12':
            $SRM_hex="#cb6c00";
            break;

        case '13':
            $SRM_hex="#c66401";
            break;

        case '14':
            $SRM_hex="#bf5c01";
            break;

        case '15':
            $SRM_hex="#b65300";
            break;

        case '16':
            $SRM_hex="#b04f00";
            break;

        case '17':
            $SRM_hex="#ac4701";
            break;

        case '18':
            $SRM_hex="#a24001";
            break;

        case '19':
            $SRM_hex="#9c3900";
            break;

        case '20':
            $SRM_hex="#963500";
            break;
        
        case '21':
            $SRM_hex="#912f00";
            break;

        case '22':
            $SRM_hex="#8f2e00";
            break;

        case '23':
            $SRM_hex="#8e2d00";
            break;

        case '24':
            $SRM_hex="#8b2c00";
            break;

        case '25':
            $SRM_hex="#872900";
            break;

        case '26':
            $SRM_hex="#832501";
            break;

        case '27':
            $SRM_hex="#802101";
            break;

        case '28':
            $SRM_hex="#7e1f01";
            break;

        case '29':
            $SRM_hex="#7b1e01";
            break;

        case '30':
            $SRM_hex="#771c01";
            break;

        case '31':
            $SRM_hex="#741c00";
            break;

        case '32':
            $SRM_hex="#721b00";
            break;

        case '33':
            $SRM_hex="#6f1801";
            break;

        case '34':
            $SRM_hex="#6c1501";
            break;

        case '35':
            $SRM_hex="#6a1301";
            break;

        case '36':
            $SRM_hex="#671000";
            break;

        case '37':
            $SRM_hex="#650f00";
            break;

        case '38':
            $SRM_hex="#620f01";
            break;

        case '39':
            $SRM_hex="#5e0e00";
            break;

        case '40':
            $SRM_hex="#5b0d00";
            break;
        default:
            $SRM_hex="#fff";
            break;
        }
        return $SRM_hex;
    }

    function Calcula_SRM($volume_em_litros,$kgramas,$cor_grao){
        // COR
        $volume_gal = $volume_em_litros * 3.785411784;// CONVERSSÃO DE LITROS PARA GALÃO    
        $peso_grao = ($kgramas * 1000) * 0.0022046;

        $UCM = ($peso_grao/*(em libras)*/ * $cor_grao/*(em graus lovibond)*/) / $volume_gal /*(em galões americano)*/;
        //|\\ Para cervejas leves, o UCM apresenta uma boa estimativa de cor SRM, entretanto quando a coloração da cerveja ultrapassa 6-8 SRM, você precisa fazer uma correção utilizando a equação de Morey.
        $SRM=0;
        $SRM = 1.4922 * ($UCM ** 0.6859);

        return $SRM;
    }


    function Calcula_EBC($SRM){
        $EBC = $SRM * 1.97;
        return $EBC;
    }



// ___________________________________________________________________________________________________________________________________________________________________________________________________________
// ------------------------------FIM SRM/EBC------------------------------------------------------------------------------------------------------------------------------------------------------------------
//____________________________________________________________________________________________________________________________________________________________________________________________________________

    function Unidade_medida_porcent_para_decimal($alfa_acido){
        // UNIDADE DE ALFA ACIDO É RECEBIDA EM %, LOGO DEVE TER COMO NUMERO SÓLIDO A REPRESENTACAO REAL.
        $A = $alfa_acido/100;
        return $A;
    }

    function Unidade_medida_mg_para_g($alfa_acido){
         // PESO DO LÚPULO É RECEBIDO EM GRAMAS, MAS DEVE ESTAR EM MILIGRAMAS
        $peso_lupulo_mg = $peso_lupulo_g * 1000;
        return $peso_lupulo_mg;
    }

    function Calcula_IBU($U,$A,$peso_lupulo_mg,$volume_em_litros){
        $IBU = ($U * $A * $peso_lupulo_mg) / $volume_em_litros;
        return $IBU;
    }



    function Utilizacao_IBU ($og, $tempo){

        $tempoFervura[3][1030] = 0.034;
        $tempoFervura[3][1040] = 0.031;
        $tempoFervura[3][1050] = 0.029;
        $tempoFervura[3][1060] = 0.026;
        $tempoFervura[3][1070] = 0.024;
        $tempoFervura[3][1080] = 0.022;
        $tempoFervura[3][1190] = 0.020;
        $tempoFervura[3][1100] = 0.018;
        $tempoFervura[3][1110] = 0.017;
        $tempoFervura[3][1120] = 0.015;
        $tempoFervura[3][1130] = 0.014;

        $tempoFervura[5][1030] = 0.055;
        $tempoFervura[5][1040] = 0.050;
        $tempoFervura[5][1050] = 0.046;
        $tempoFervura[5][1060] = 0.042;
        $tempoFervura[5][1070] = 0.038;
        $tempoFervura[5][1080] = 0.035;
        $tempoFervura[5][1190] = 0.032;
        $tempoFervura[5][1100] = 0.029;
        $tempoFervura[5][1110] = 0.027;
        $tempoFervura[5][1120] = 0.025;

        $tempoFervura[6][1030] = 0.065;
        $tempoFervura[6][1040] = 0.059;
        $tempoFervura[6][1050] = 0.054;
        $tempoFervura[6][1060] = 0.049;
        $tempoFervura[6][1070] = 0.045;
        $tempoFervura[6][1080] = 0.041;
        $tempoFervura[6][1190] = 0.038;
        $tempoFervura[6][1100] = 0.035;
        $tempoFervura[6][1110] = 0.032;
        $tempoFervura[6][1120] = 0.029;
        $tempoFervura[6][1130] = 0.026;

        $tempoFervura[9][1030] = 0.092;
        $tempoFervura[9][1040] = 0.084;
        $tempoFervura[9][1050] = 0.077;
        $tempoFervura[9][1060] = 0.070;
        $tempoFervura[9][1070] = 0.064;
        $tempoFervura[9][1080] = 0.059;
        $tempoFervura[9][1190] = 0.054;
        $tempoFervura[9][1100] = 0.049;
        $tempoFervura[9][1110] = 0.045;
        $tempoFervura[9][1120] = 0.041;
        $tempoFervura[9][1130] = 0.037;

        $tempoFervura[10][1030] = 0.100;
        $tempoFervura[10][1040] = 0.091;
        $tempoFervura[10][1050] = 0.084;
        $tempoFervura[10][1060] = 0.076;
        $tempoFervura[10][1070] = 0.070;
        $tempoFervura[10][1080] = 0.064;
        $tempoFervura[10][1190] = 0.058;
        $tempoFervura[10][1100] = 0.053;
        $tempoFervura[10][1110] = 0.049;
        $tempoFervura[10][1120] = 0.045;

        $tempoFervura[12][1030] = 0.116;
        $tempoFervura[12][1040] = 0.106;
        $tempoFervura[12][1050] = 0.097;
        $tempoFervura[12][1060] = 0.088;
        $tempoFervura[12][1070] = 0.081;
        $tempoFervura[12][1080] = 0.074;
        $tempoFervura[12][1190] = 0.068;
        $tempoFervura[12][1100] = 0.062;
        $tempoFervura[12][1110] = 0.056;
        $tempoFervura[12][1120] = 0.052;
        $tempoFervura[12][1130] = 0.047;

        $tempoFervura[15][1030] = 0.137;
        $tempoFervura[15][1040] = 0.125;
        $tempoFervura[15][1050] = 0.114;
        $tempoFervura[15][1060] = 0.105;
        $tempoFervura[15][1070] = 0.096;
        $tempoFervura[15][1080] = 0.087;
        $tempoFervura[15][1190] = 0.080;
        $tempoFervura[15][1100] = 0.073;
        $tempoFervura[15][1110] = 0.067;
        $tempoFervura[15][1120] = 0.061;
        $tempoFervura[15][1130] = 0.056;

        $tempoFervura[18][1030] = 0.156;
        $tempoFervura[18][1040] = 0.142;
        $tempoFervura[18][1050] = 0.130;
        $tempoFervura[18][1060] = 0.119;
        $tempoFervura[18][1070] = 0.109;
        $tempoFervura[18][1080] = 0.099;
        $tempoFervura[18][1190] = 0.091;
        $tempoFervura[18][1100] = 0.083;
        $tempoFervura[18][1110] = 0.076;
        $tempoFervura[18][1120] = 0.069;
        $tempoFervura[18][1130] = 0.063;

        $tempoFervura[20][1030] = 0.167;
        $tempoFervura[20][1040] = 0.153;
        $tempoFervura[20][1050] = 0.140;
        $tempoFervura[20][1060] = 0.128;
        $tempoFervura[20][1070] = 0.117;
        $tempoFervura[20][1080] = 0.107;
        $tempoFervura[20][1190] = 0.098;
        $tempoFervura[20][1100] = 0.089;
        $tempoFervura[20][1110] = 0.081;
        $tempoFervura[20][1120] = 0.074;

        $tempoFervura[21][1030] = 0.173;
        $tempoFervura[21][1040] = 0.158;
        $tempoFervura[21][1050] = 0.144;
        $tempoFervura[21][1060] = 0.132;
        $tempoFervura[21][1070] = 0.120;
        $tempoFervura[21][1080] = 0.110;
        $tempoFervura[21][1190] = 0.101;
        $tempoFervura[21][1100] = 0.092;
        $tempoFervura[21][1110] = 0.084;
        $tempoFervura[21][1120] = 0.077;
        $tempoFervura[21][1130] = 0.070;

        $tempoFervura[24][1030] = 0.187;
        $tempoFervura[24][1040] = 0.171;
        $tempoFervura[24][1050] = 0.157;
        $tempoFervura[24][1060] = 0.143;
        $tempoFervura[24][1070] = 0.131;
        $tempoFervura[24][1080] = 0.120;
        $tempoFervura[24][1190] = 0.109;
        $tempoFervura[24][1100] = 0.100;
        $tempoFervura[24][1110] = 0.091;
        $tempoFervura[24][1120] = 0.083;
        $tempoFervura[24][1130] = 0.076;

        $tempoFervura[25][1030] = 0.192;
        $tempoFervura[25][1040] = 0.175;
        $tempoFervura[25][1050] = 0.160;
        $tempoFervura[25][1060] = 0.147;
        $tempoFervura[25][1070] = 0.134;
        $tempoFervura[25][1080] = 0.122;
        $tempoFervura[25][1190] = 0.112;
        $tempoFervura[25][1100] = 0.102;
        $tempoFervura[25][1110] = 0.094;
        $tempoFervura[25][1120] = 0.085;

        $tempoFervura[27][1030] = 0.201;
        $tempoFervura[27][1040] = 0.183;
        $tempoFervura[27][1050] = 0.168;
        $tempoFervura[27][1060] = 0.153;
        $tempoFervura[27][1070] = 0.140;
        $tempoFervura[27][1080] = 0.128;
        $tempoFervura[27][1190] = 0.117;
        $tempoFervura[27][1100] = 0.107;
        $tempoFervura[27][1110] = 0.098;
        $tempoFervura[27][1120] = 0.089;
        $tempoFervura[27][1130] = 0.082;

        $tempoFervura[30][1030] = 0.212;
        $tempoFervura[30][1040] = 0.194;
        $tempoFervura[30][1050] = 0.177;
        $tempoFervura[30][1060] = 0.162;
        $tempoFervura[30][1070] = 0.148;
        $tempoFervura[30][1080] = 0.135;
        $tempoFervura[30][1190] = 0.124;
        $tempoFervura[30][1100] = 0.113;
        $tempoFervura[30][1110] = 0.103;
        $tempoFervura[30][1120] = 0.094;
        $tempoFervura[30][1130] = 0.086;

        $tempoFervura[33][1030] = 0.223;
        $tempoFervura[33][1040] = 0.203;
        $tempoFervura[33][1050] = 0.186;
        $tempoFervura[33][1060] = 0.170;
        $tempoFervura[33][1070] = 0.155;
        $tempoFervura[33][1080] = 0.142;
        $tempoFervura[33][1190] = 0.130;
        $tempoFervura[33][1100] = 0.119;
        $tempoFervura[33][1110] = 0.108;
        $tempoFervura[33][1120] = 0.099;
        $tempoFervura[33][1130] = 0.091;

        $tempoFervura[35][1030] = 0.229;
        $tempoFervura[35][1040] = 0.209;
        $tempoFervura[35][1050] = 0.191;
        $tempoFervura[35][1060] = 0.175;
        $tempoFervura[35][1070] = 0.160;
        $tempoFervura[35][1080] = 0.146;
        $tempoFervura[35][1190] = 0.133;
        $tempoFervura[35][1100] = 0.122;
        $tempoFervura[35][1110] = 0.111;
        $tempoFervura[35][1120] = 0.102;

        $tempoFervura[36][1030] = 0.232;
        $tempoFervura[36][1040] = 0.212;
        $tempoFervura[36][1050] = 0.194;
        $tempoFervura[36][1060] = 0.177;
        $tempoFervura[36][1070] = 0.162;
        $tempoFervura[36][1080] = 0.148;
        $tempoFervura[36][1190] = 0.135;
        $tempoFervura[36][1100] = 0.124;
        $tempoFervura[36][1110] = 0.113;
        $tempoFervura[36][1120] = 0.103;
        $tempoFervura[36][1130] = 0.094;

        $tempoFervura[39][1030] = 0.240;
        $tempoFervura[39][1040] = 0.219;
        $tempoFervura[39][1050] = 0.200;
        $tempoFervura[39][1060] = 0.183;
        $tempoFervura[39][1070] = 0.167;
        $tempoFervura[39][1080] = 0.153;
        $tempoFervura[39][1190] = 0.140;
        $tempoFervura[39][1100] = 0.128;
        $tempoFervura[39][1110] = 0.117;
        $tempoFervura[39][1120] = 0.107;
        $tempoFervura[39][1130] = 0.098;

        $tempoFervura[40][1030] = 0.242;
        $tempoFervura[40][1040] = 0.221;
        $tempoFervura[40][1050] = 0.202;
        $tempoFervura[40][1060] = 0.185;
        $tempoFervura[40][1070] = 0.169;
        $tempoFervura[40][1080] = 0.155;
        $tempoFervura[40][1190] = 0.141;
        $tempoFervura[40][1100] = 0.129;
        $tempoFervura[40][1110] = 0.118;
        $tempoFervura[40][1120] = 0.108;

        $tempoFervura[42][1030] = 0.247;
        $tempoFervura[42][1040] = 0.228;
        $tempoFervura[42][1050] = 0.206;
        $tempoFervura[42][1060] = 0.189;
        $tempoFervura[42][1070] = 0.172;
        $tempoFervura[42][1080] = 0.158;
        $tempoFervura[42][1190] = 0.144;
        $tempoFervura[42][1100] = 0.132;
        $tempoFervura[42][1110] = 0.120;
        $tempoFervura[42][1120] = 0.110;
        $tempoFervura[42][1130] = 0.101;

        $tempoFervura[45][1030] = 0.253;
        $tempoFervura[45][1040] = 0.232;
        $tempoFervura[45][1050] = 0.212;
        $tempoFervura[45][1060] = 0.194;
        $tempoFervura[45][1070] = 0.177;
        $tempoFervura[45][1080] = 0.162;
        $tempoFervura[45][1190] = 0.148;
        $tempoFervura[45][1100] = 0.135;
        $tempoFervura[45][1110] = 0.123;
        $tempoFervura[45][1120] = 0.113;
        $tempoFervura[45][1130] = 0.103;

        $tempoFervura[48][1030] = 0.259;
        $tempoFervura[48][1040] = 0.237;
        $tempoFervura[48][1050] = 0.216;
        $tempoFervura[48][1060] = 0.198;
        $tempoFervura[48][1070] = 0.181;
        $tempoFervura[48][1080] = 0.165;
        $tempoFervura[48][1190] = 0.151;
        $tempoFervura[48][1100] = 0.138;
        $tempoFervura[48][1110] = 0.126;
        $tempoFervura[48][1120] = 0.115;
        $tempoFervura[48][1130] = 0.105;

        $tempoFervura[50][1030] = 0.263;
        $tempoFervura[50][1040] = 0.240;
        $tempoFervura[50][1050] = 0.219;
        $tempoFervura[50][1060] = 0.200;
        $tempoFervura[50][1070] = 0.183;
        $tempoFervura[50][1080] = 0.168;
        $tempoFervura[50][1190] = 0.153;
        $tempoFervura[50][1100] = 0.140;
        $tempoFervura[50][1110] = 0.128;
        $tempoFervura[50][1120] = 0.117;

        $tempoFervura[51][1030] = 0.264;
        $tempoFervura[51][1040] = 0.241;
        $tempoFervura[51][1050] = 0.221;
        $tempoFervura[51][1060] = 0.202;
        $tempoFervura[51][1070] = 0.184;
        $tempoFervura[51][1080] = 0.169;
        $tempoFervura[51][1190] = 0.154;
        $tempoFervura[51][1100] = 0.141;
        $tempoFervura[51][1110] = 0.129;
        $tempoFervura[51][1120] = 0.118;
        $tempoFervura[51][1130] = 0.108;

        $tempoFervura[54][1030] = 0.269;
        $tempoFervura[54][1040] = 0.246;
        $tempoFervura[54][1050] = 0.224;
        $tempoFervura[54][1060] = 0.205;
        $tempoFervura[54][1070] = 0.188;
        $tempoFervura[54][1080] = 0.171;
        $tempoFervura[54][1190] = 0.157;
        $tempoFervura[54][1100] = 0.143;
        $tempoFervura[54][1110] = 0.131;
        $tempoFervura[54][1120] = 0.120;
        $tempoFervura[54][1130] = 0.109;

        $tempoFervura[55][1030] = 0.270;
        $tempoFervura[55][1040] = 0.247;
        $tempoFervura[55][1050] = 0.226;
        $tempoFervura[55][1060] = 0.206;
        $tempoFervura[55][1070] = 0.188;
        $tempoFervura[55][1080] = 0.172;
        $tempoFervura[55][1190] = 0.157;
        $tempoFervura[55][1100] = 0.144;
        $tempoFervura[55][1110] = 0.132;
        $tempoFervura[55][1120] = 0.120;

        $tempoFervura[57][1030] = 0.273;
        $tempoFervura[57][1040] = 0.249;
        $tempoFervura[57][1050] = 0.228;
        $tempoFervura[57][1060] = 0.208;
        $tempoFervura[57][1070] = 0.190;
        $tempoFervura[57][1080] = 0.174;
        $tempoFervura[57][1190] = 0.159;
        $tempoFervura[57][1100] = 0.145;
        $tempoFervura[57][1110] = 0.133;
        $tempoFervura[57][1120] = 0.121;
        $tempoFervura[57][1130] = 0.111;

        $tempoFervura[60][1030] = 0.276;
        $tempoFervura[60][1040] = 0.252;
        $tempoFervura[60][1050] = 0.231;
        $tempoFervura[60][1060] = 0.211;
        $tempoFervura[60][1070] = 0.193;
        $tempoFervura[60][1080] = 0.176;
        $tempoFervura[60][1190] = 0.161;
        $tempoFervura[60][1100] = 0.147;
        $tempoFervura[60][1110] = 0.135;
        $tempoFervura[60][1120] = 0.123;
        $tempoFervura[60][1130] = 0.112;

        $tempoFervura[70][1030] = 0.285;
        $tempoFervura[70][1040] = 0.261;
        $tempoFervura[70][1050] = 0.238;
        $tempoFervura[70][1060] = 0.218;
        $tempoFervura[70][1070] = 0.199;
        $tempoFervura[70][1080] = 0.182;
        $tempoFervura[70][1190] = 0.166;
        $tempoFervura[70][1100] = 0.152;
        $tempoFervura[70][1110] = 0.139;
        $tempoFervura[70][1120] = 0.127;
        $tempoFervura[70][1130] = 0.116;

        $tempoFervura[80][1030] = 0.291;
        $tempoFervura[80][1040] = 0.266;
        $tempoFervura[80][1050] = 0.243;
        $tempoFervura[80][1060] = 0.222;
        $tempoFervura[80][1070] = 0.203;
        $tempoFervura[80][1080] = 0.186;
        $tempoFervura[80][1190] = 0.170;
        $tempoFervura[80][1100] = 0.155;
        $tempoFervura[80][1110] = 0.142;
        $tempoFervura[80][1120] = 0.130;
        $tempoFervura[80][1130] = 0.119;

        $tempoFervura[90][1030] = 0.295;
        $tempoFervura[90][1040] = 0.270;
        $tempoFervura[90][1050] = 0.247;
        $tempoFervura[90][1060] = 0.226;
        $tempoFervura[90][1070] = 0.206;
        $tempoFervura[90][1080] = 0.188;
        $tempoFervura[90][1190] = 0.172;
        $tempoFervura[90][1100] = 0.157;
        $tempoFervura[90][1110] = 0.144;
        $tempoFervura[90][1120] = 0.132;
        $tempoFervura[90][1130] = 0.120;

        $tempoFervura[100][1030] = 0.298;
        $tempoFervura[100][1040] = 0.272;
        $tempoFervura[100][1050] = 0.249;
        $tempoFervura[100][1060] = 0.228;
        $tempoFervura[100][1070] = 0.208;
        $tempoFervura[100][1080] = 0.190;
        $tempoFervura[100][1190] = 0.174;
        $tempoFervura[100][1100] = 0.159;
        $tempoFervura[100][1110] = 0.145;
        $tempoFervura[100][1120] = 0.133;

        $tempoFervura[110][1030] = 0.300;
        $tempoFervura[110][1040] = 0.274;
        $tempoFervura[110][1050] = 0.251;
        $tempoFervura[110][1060] = 0.229;
        $tempoFervura[110][1070] = 0.209;
        $tempoFervura[110][1080] = 0.191;
        $tempoFervura[110][1190] = 0.175;
        $tempoFervura[110][1100] = 0.160;
        $tempoFervura[110][1110] = 0.146;
        $tempoFervura[110][1120] = 0.134;

        $tempoFervura[120][1030] = 0.301;
        $tempoFervura[120][1040] = 0.275;
        $tempoFervura[120][1050] = 0.252;
        $tempoFervura[120][1060] = 0.230;
        $tempoFervura[120][1070] = 0.210;
        $tempoFervura[120][1080] = 0.192;
        $tempoFervura[120][1190] = 0.176;
        $tempoFervura[120][1100] = 0.161;
        $tempoFervura[120][1110] = 0.147;
        $tempoFervura[120][1120] = 0.134;
        $tempoFervura[120][1130] = 0.123;

        $U = $tempoFervura[$tempo][$og];
        return $U;
    }

   

