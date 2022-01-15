const countries = [
    {
    "flag": "flags/af.png",
    "name": "de l'Afghanistan",
    "capital": "Kaboul"
    },
    {
    "flag": "flags/al.png",
    "name": "de l'Albanie",
    "capital": "Tirana"
    },
    {
    "flag": "flags/dz.png",
    "name": "de l'Algérie",
    "capital": "Alger"
    },
    {
    "flag": "flags/ad.png",
    "name": "de l'Andorre",
    "capital": "Andorre la vieille"
    },
    {
    "flag": "flags/ao.png",
    "name": "de l'Angola",
    "capital": "Luanda"
    },
    {
    "flag": "flags/ag.png",
    "name": "d'Antigua et Barbuda",
    "capital": "Saint John's"
    },
    {
    "flag": "flags/ar.png",
    "name": "de l'Argentine",
    "capital": "Buenos Aires"
    },
    {
    "flag": "flags/am.png",
    "name": "de l'Arménie",
    "capital": "Erevan"
    },
    {
    "flag": "flags/au.png",
    "name": "de l'Australie",
    "capital": "Canberra"
    },
    {
    "flag": "flags/at.png",
    "name": "de l'Autriche",
    "capital": "Vienne"
    },
    {
    "flag": "flags/az.png",
    "name": "de l'Azerbaïdjan",
    "capital": "Bakou"
    },
    {
    "flag": "flags/bs.png",
    "name": "des Bahamas",
    "capital": "Nassau"
    },
    {
    "flag": "flags/bh.png",
    "name": "du Bahreïn",
    "capital": "Manama"
    },
    {
    "flag": "flags/bd.png",
    "name": "du Bangladesh",
    "capital": "Dacca"
    },
    {
    "flag": "flags/bb.png",
    "name": "de la Barbade",
    "capital": "Bridgetown"
    },
    {
    "flag": "flags/by.png",
    "name": "de la Biélorussie",
    "capital": "Minsk"
    },
    {
    "flag": "flags/be.png",
    "name": "de la Belgique",
    "capital": "Bruxelles"
    },
    {
    "flag": "flags/bz.png",
    "name": "du Bélize",
    "capital": "Belmopan"
    },
    {
    "flag": "flags/bj.png",
    "name": "du Bénin",
    "capital": "Porto-Novo"
    },
    {
    "flag": "flags/bt.png",
    "name": "du Bhoutan",
    "capital": "Thimphou"
    },
    {
    "flag": "flags/bo.png",
    "name": "de la Bolivie",
    "capital": "Sucre"
    },
    {
    "flag": "flags/ba.png",
    "name": "de la Bosnie Herzégovine",
    "capital": "Sarajevo"
    },
    {
    "flag": "flags/bw.png",
    "name": "du Botswana",
    "capital": "Gaborone"
    },
    {
    "flag": "flags/br.png",
    "name": "du Brésil",
    "capital": "Brasilia"
    },
    {
    "flag": "flags/bn.png",
    "name": "du Bruneï",
    "capital": "Bandar Seri Begawan"
    },
    {
    "flag": "flags/bg.png",
    "name": "de la Bulgarie",
    "capital": "Sofia"
    },
    {
    "flag": "flags/bf.png",
    "name": "du Burkina Faso",
    "capital": "Ouagadougou"
    },
    {
    "flag": "flags/bi.png",
    "name": "du Burundi",
    "capital": "Gitega"
    },
    {
    "flag": "flags/kh.png",
    "name": "du Cambodge",
    "capital": "Phnom Penh"
    },
    {
    "flag": "flags/cm.png",
    "name": "du Cameroun",
    "capital": "Yaoundé"
    },
    {
    "flag": "flags/ca.png",
    "name": "du Canada",
    "capital": "Ottawa"
    },
    {
    "flag": "flags/cv.png",
    "name": "du Cap Vert",
    "capital": "Praia"
    },
    {
    "flag": "flags/cf.png",
    "name": "de la République Centrafricaine",
    "capital": "Bangui"
    },
    {
    "flag": "flags/td.png",
    "name": "du Tchad",
    "capital": "N'Djamena"
    },
    {
    "flag": "flags/cl.png",
    "name": "du Chili",
    "capital": "Santiago"
    },
    {
    "flag": "flags/cn.png",
    "name": "de la Chine",
    "capital": "Pékin"
    },
    {
    "flag": "flags/co.png",
    "name": "de la Colombie",
    "capital": "Bogotá"
    },
    {
    "flag": "flags/km.png",
    "name": "des Comoros",
    "capital": "Moroni"
    },
    {
    "flag": "flags/cg.png",
    "name": "du Congo",
    "capital": "Brazzaville"
    },
    {
    "flag": "flags/cd.png",
    "name": "de la République démocratique du Congo",
    "capital": "Kinshasa"
    },
    {
    "flag": "flags/ck.png",
    "name": "des ïles Cook",
    "capital": "Avarua"
    },
    {
    "flag": "flags/cr.png",
    "name": "du Costa Rica",
    "capital": "San José"
    },
    {
    "flag": "flags/hr.png",
    "name": "de la Croatie",
    "capital": "Zagreb"
    },
    {
    "flag": "flags/cu.png",
    "name": "de Cuba",
    "capital": "la Havane"
    },
    {
    "flag": "flags/cy.png",
    "name": "de Chypre",
    "capital": "Nicosie"
    },
    {
    "flag": "flags/cz.png",
    "name": "de la République Tchèque",
    "capital": "Prague"
    },
    {
    "flag": "flags/dk.png",
    "name": "du Danemark",
    "capital": "Copenhague"
    },
    {
    "flag": "flags/dj.png",
    "name": "de Djibouti",
    "capital": "Djibouti"
    },
    {
    "flag": "flags/dm.png",
    "name": "de la Dominique",
    "capital": "Roseau"
    },
    {
    "flag": "flags/do.png",
    "name": "de la République Dominicaine",
    "capital": "Saint Domingue"
    },
    {
    "flag": "flags/ec.png",
    "name": "de l'Equateur",
    "capital": "Quito"
    },
    {
    "flag": "flags/eg.png",
    "name": "de l'Egypte",
    "capital": "Le Caire"
    },
    {
    "flag": "flags/sv.png",
    "name": "du Salvador",
    "capital": "San Salvador"
    },
    {
    "flag": "flags/gq.png",
    "name": "de la Guinée Equatoriale",
    "capital": "Malabo"
    },
    {
    "flag": "flags/er.png",
    "name": "de l'Erythrée",
    "capital": "Asmara"
    },
    {
    "flag": "flags/ee.png",
    "name": "de l'Estonie",
    "capital": "Tallinn"
    },
    {
    "flag": "flags/et.png",
    "name": "de l'Ethiopie",
    "capital": "Addis Abeba"
    },
    {
    "flag": "flags/fj.png",
    "name": "des Fidji",
    "capital": "Suva"
    },
    {
    "flag": "flags/fi.png",
    "name": "de la Finlande",
    "capital": "Helsinki"
    },
    {
    "flag": "flags/fr.png",
    "name": "de la France",
    "capital": "Paris"
    },
    {
    "flag": "flags/ga.png",
    "name": "du Gabon",
    "capital": "Libreville"
    },
    {
    "flag": "flags/gm.png",
    "name": "de la Gambie",
    "capital": "Banjul"
    },
    {
    "flag": "flags/ge.png",
    "name": "de la Géorgie",
    "capital": "Tbilissi"
    },
    {
    "flag": "flags/de.png",
    "name": "de l'Allemagne",
    "capital": "Berlin"
    },
    {
    "flag": "flags/gh.png",
    "name": "du Ghana",
    "capital": "Accra"
    },
    {
    "flag": "flags/gr.png",
    "name": "de la Grèce",
    "capital": "Athènes"
    },
    {
    "flag": "flags/gd.png",
    "name": "de Grenade",
    "capital": "Saint George's"
    },
    {
    "flag": "flags/gt.png",
    "name": "du Guatemala",
    "capital": "Guatemala City"
    },
    {
    "flag": "flags/gn.png",
    "name": "de la Guinée",
    "capital": "Conakry"
    },
    {
    "flag": "flags/gw.png",
    "name": "de la Guinée-Bissau",
    "capital": "Bissau"
    },
    {
    "flag": "flags/gy.png",
    "name": "de la Guyana",
    "capital": "Georgetown"
    },
    {
    "flag": "flags/ht.png",
    "name": "d'Haïti",
    "capital": "Port-au-Prince"
    },    {
    "flag": "flags/hn.png",
    "name": "du Honduras",
    "capital": "Tegucigalpa"
    },
    {
    "flag": "flags/hu.png",
    "name": "de la Hongrie",
    "capital": "Budapest"
    },
    {
    "flag": "flags/is.png",
    "name": "de l'Islande",
    "capital": "Reykjavík"
    },
    {
    "flag": "flags/in.png",
    "name": "de l'Inde",
    "capital": "New Delhi"
    },
    {
    "flag": "flags/id.png",
    "name": "de l'Indonésie",
    "capital": "Jakarta"
    },
    {
    "flag": "flags/ci.png",
    "name": "de la Côte d'Ivoire",
    "capital": "Yamoussoukro"
    },
    {
    "flag": "flags/ir.png",
    "name": "de l'Iran",
    "capital": "Téhéran"
    },
    {
    "flag": "flags/iq.png",
    "name": "de l'Irak",
    "capital": "Bagdad"
    },
    {
    "flag": "flags/ie.png",
    "name": "de l'Irlande",
    "capital": "Dublin"
    },
    {
    "flag": "flags/il.png",
    "name": "Israël",
    "capital": "Jérusalem"
    },
    {
    "flag": "flags/it.png",
    "name": "de l'Italie",
    "capital": "Rome"
    },
    {
    "flag": "flags/jm.png",
    "name": "de la Jamaïque",
    "capital": "Kingston"
    },
    {
    "flag": "flags/jp.png",
    "name": "du Japon",
    "capital": "Tokyo"
    },
    {
    "flag": "flags/jo.png",
    "name": "de la Jordanie",
    "capital": "Amman"
    },
    {
    "flag": "flags/kz.png",
    "name": "du Kazakhstan",
    "capital": "Noursoultan"
    },
    {
    "flag": "flags/ke.png",
    "name": "du Kenya",
    "capital": "Nairobi"
    },
    {
    "flag": "flags/ki.png",
    "name": "des Kiribati",
    "capital": "Tarawa Sud"
    },
    {
    "flag": "flags/kw.png",
    "name": "du Koweit",
    "capital": "Koweit City"
    },
    {
    "flag": "flags/kg.png",
    "name": "du Kirghizistan",
    "capital": "Bichkek"
    },
    {
    "flag": "flags/la.png",
    "name": "du Laos",
    "capital": "Vientiane"
    },
    {
    "flag": "flags/lv.png",
    "name": "de la Lettonie",
    "capital": "Riga"
    },
    {
    "flag": "flags/lb.png",
    "name": "du Liban",
    "capital": "Beyrouth"
    },
    {
    "flag": "flags/ls.png",
    "name": "du Lesotho",
    "capital": "Maseru"
    },
    {
    "flag": "flags/lr.png",
    "name": "du Libéria",
    "capital": "Monrovia"
    },
    {
    "flag": "flags/ly.png",
    "name": "de la Libye",
    "capital": "Tripoli"
    },
    {
    "flag": "flags/li.png",
    "name": "du Liechtenstein",
    "capital": "Vaduz"
    },
    {
    "flag": "flags/lt.png",
    "name": "de la Lituanie",
    "capital": "Vilnius"
    },
    {
    "flag": "flags/lu.png",
    "name": "du Luxembourg",
    "capital": "Luxembourg"
    },
    {
    "flag": "flags/mk.png",
    "name": "de la Macédoine",
    "capital": "Skopje"
    },
    {
    "flag": "flags/mg.png",
    "name": "de Madagascar",
    "capital": "Antananarivo"
    },
    {
    "flag": "flags/mw.png",
    "name": "du Malawi",
    "capital": "Lilongwe"
    },
    {
    "flag": "flags/my.png",
    "name": "de la Malaisie",
    "capital": "Kuala Lumpur"
    },
    {
    "flag": "flags/mv.png",
    "name": "des Maldives",
    "capital": "Malé"
    },
    {
    "flag": "flags/ml.png",
    "name": "du Mali",
    "capital": "Bamako"
    },
    {
    "flag": "flags/mt.png",
    "name": "de Malte",
    "capital": "la Valette"
    },
    {
    "flag": "flags/mh.png",
    "name": "des îles Marshall",
    "capital": "Majuro"
    },
    {
    "flag": "flags/mr.png",
    "name": "de la Mauritanie",
    "capital": "Nouakchott"
    },
    {
    "flag": "flags/mu.png",
    "name": "de l'île Maurice",
    "capital": "Port Louis"
    },
    {
    "flag": "flags/mx.png",
    "name": "du Méxique",
    "capital": "Mexico City"
    },
    {
    "flag": "flags/fm.png",
    "name": "de la Micronésie",
    "capital": "Palikir"
    },
    {
    "flag": "flags/md.png",
    "name": "de la Moldavie",
    "capital": "Chișinău"
    },
    {
    "flag": "flags/mc.png",
    "name": "de Monaco",
    "capital": "Monaco"
    },
    {
    "flag": "flags/mn.png",
    "name": "de la Mongolie",
    "capital": "Oulan Bator"
    },
    {
    "flag": "flags/me.png",
    "name": "du Monténégro",
    "capital": "Podgorica"
    },
    {
    "flag": "flags/ma.png",
    "name": "du Maroc",
    "capital": "Rabat"
    },
    {
    "flag": "flags/mz.png",
    "name": "du Mozambique",
    "capital": "Maputo"
    },
    {
    "flag": "flags/mm.png",
    "name": "du Myanmar",
    "capital": "Naypyidaw"
    },
    {
    "flag": "flags/na.png",
    "name": "de la Namibie",
    "capital": "Windhoek"
    },
    {
    "flag": "flags/nr.png",
    "name": "de Nauru",
    "capital": "Yaren"
    },
    {
    "flag": "flags/np.png",
    "name": "du Népal",
    "capital": "Kathmandou"
    },
    {
    "flag": "flags/nl.png",
    "name": "du Pays-Bas",
    "capital": "Amsterdam"
    },
    {
    "flag": "flags/nz.png",
    "name": "de la Nouvelle Zélande",
    "capital": "Wellington"
    },
    {
    "flag": "flags/ni.png",
    "name": "du Nicaragua",
    "capital": "Managua"
    },
    {
    "flag": "flags/ne.png",
    "name": "du Niger",
    "capital": "Niamey"
    },
    {
    "flag": "flags/ng.png",
    "name": "du Nigeria",
    "capital": "Abuja"
    },
    {
    "flag": "flags/kp.png",
    "name": "de la Corée de Nord",
    "capital": "Pyongyang"
    },
    {
    "flag": "flags/no.png",
    "name": "de la Norvège",
    "capital": "Oslo"
    },
    {
    "flag": "flags/om.png",
    "name": "d'Oman",
    "capital": "Mascate"
    },
    {
    "flag": "flags/pk.png",
    "name": "du Pakistan",
    "capital": "Islamabad"
    },
    {
    "flag": "flags/pw.png",
    "name": "du Palaos",
    "capital": "Ngerulmud"
    },
    {
    "flag": "flags/ps.png",
    "name": "de la Palestine",
    "capital": "Ramallah"
    },
    {
    "flag": "flags/pa.png",
    "name": "Panama",
    "capital": "Panama City"
    },
    {
    "flag": "flags/pg.png",
    "name": "de la Papouasie Nouvelle Guinée",
    "capital": "Port Moresby"
    },
    {
    "flag": "flags/py.png",
    "name": "du Paraguay",
    "capital": "Asunción"
    },
    {
    "flag": "flags/pe.png",
    "name": "du Pérou",
    "capital": "Lima"
    },
    {
    "flag": "flags/ph.png",
    "name": "des Philippines",
    "capital": "Manille"
    },
    {
    "flag": "flags/pl.png",
    "name": "de la Pologne",
    "capital": "Varsovie"
    },
    {
    "flag": "flags/pt.png",
    "name": "du Portugal",
    "capital": "Lisbonne"
    },
    {
    "flag": "flags/qa.png",
    "name": "du Qatar",
    "capital": "Doha"
    },
    {
    "flag": "flags/xk.png",
    "name": "du Kosovo",
    "capital": "Pristina"
    },
    {
    "flag": "flags/ro.png",
    "name": "de la Roumanie",
    "capital": "Bucarest"
    },
    {
    "flag": "flags/ru.png",
    "name": "de la Russie",
    "capital": "Moscou"
    },
    {
    "flag": "flags/rw.png",
    "name": "du Rwanda",
    "capital": "Kigali"
    },
    {
    "flag": "flags/kn.png",
    "name": "de Saint Christophe and Niévès",
    "capital": "Basseterre"
    },
    {
    "flag": "flags/lc.png",
    "name": "de Sainte Lucie",
    "capital": "Castries"
    },
    {
    "flag": "flags/vc.png",
    "name": "de Saint Vincent et les Grenadines",
    "capital": "Kingstown"
    },
    {
    "flag": "flags/ws.png",
    "name": "du Samoa",
    "capital": "Apia"
    },
    {
    "flag": "flags/sm.png",
    "name": "du Saint Marin",
    "capital": "Saint Marin"
    },
    {
    "flag": "flags/st.png",
    "name": "de Sao Tomé and Principe",
    "capital": "São Tomé"
    },
    {
    "flag": "flags/sa.png",
    "name": "de l'Arabie Soudite",
    "capital": "Riyad"
    },
    {
    "flag": "flags/sn.png",
    "name": "du Sénégal",
    "capital": "Dakar"
    },
    {
    "flag": "flags/rs.png",
    "name": "de la Serbie",
    "capital": "Belgrade"
    },
    {
    "flag": "flags/sc.png",
    "name": "des Seychelles",
    "capital": "Victoria"
    },
    {
    "flag": "flags/sl.png",
    "name": "du Sierra Leone",
    "capital": "Freetown"
    },
    {
    "flag": "flags/sg.png",
    "name": "de Singapour",
    "capital": "Singapour"
    },
    {
    "flag": "flags/sk.png",
    "name": "de la Slovaquie",
    "capital": "Bratislava"
    },
    {
    "flag": "flags/si.png",
    "name": "de la Slovènie",
    "capital": "Ljubljana"
    },
    {
    "flag": "flags/sb.png",
    "name": "des îles Salomon",
    "capital": "Honiara"
    },
    {
    "flag": "flags/so.png",
    "name": "de la Somalie",
    "capital": "Mogadiscio"
    },
    {
    "flag": "flags/za.png",
    "name": "de l'Afrique du sud",
    "capital": "Pretoria"
    },
    {
    "flag": "flags/kr.png",
    "name": "de la Corée du Sud",
    "capital": "Séoul"
    },
    {
    "flag": "flags/ss.png",
    "name": "du Soudan du sud",
    "capital": "Djouba"
    },
    {
    "flag": "flags/es.png",
    "name": "de l'Espagne",
    "capital": "Madrid"
    },
    {
    "flag": "flags/lk.png",
    "name": "du Sri Lanka",
    "capital": "Colombo"
    },
    {
    "flag": "flags/sd.png",
    "name": "du Soudan",
    "capital": "Khartoum"
    },
    {
    "flag": "flags/sr.png",
    "name": "du Suriname",
    "capital": "Paramaribo"
    },
    {
    "flag": "flags/sz.png",
    "name": "d'Eswatini",
    "capital": "Mbabane"
    },
    {
    "flag": "flags/se.png",
    "name": "de la Suède",
    "capital": "Stockholm"
    },
    {
    "flag": "flags/ch.png",
    "name": "de la Suisse",
    "capital": "Berne"
    },
    {
    "flag": "flags/sy.png",
    "name": "de la Syrie",
    "capital": "Damas"
    },
    {
    "flag": "flags/tw.png",
    "name": "de Taïwan",
    "capital": "Taipei"
    },
    {
    "flag": "flags/tj.png",
    "name": "du Tadjikistan",
    "capital": "Douchanbé"
    },
    {
    "flag": "flags/tz.png",
    "name": "de la Tanzanie",
    "capital": "Dodoma"
    },
    {
    "flag": "flags/th.png",
    "name": "de la Thaïlande",
    "capital": "Bangkok"
    },
    {
    "flag": "flags/tl.png",
    "name": "du Timor Oriental",
    "capital": "Dili"
    },
    {
    "flag": "flags/tg.png",
    "name": "du Togo",
    "capital": "Lomé"
    },
    {
    "flag": "flags/to.png",
    "name": "des Tonga",
    "capital": "Nuku'alofa"
    },
    {
    "flag": "flags/tt.png",
    "name": "de Trinité and Tobago",
    "capital": "Port d'Espagne"
    },
    {
    "flag": "flags/tn.png",
    "name": "de la Tunisie",
    "capital": "Tunis"
    },
    {
    "flag": "flags/tr.png",
    "name": "de la Turquie",
    "capital": "Ankara"
    },
    {
    "flag": "flags/tm.png",
    "name": "du Turkménistan",
    "capital": "Achgabat"
    },
    {
    "flag": "flags/tv.png",
    "name": "des Tuvalu",
    "capital": "Funafuti"
    },
    {
    "flag": "flags/ug.png",
    "name": "de l'Ouganda",
    "capital": "Kampala"
    },
    {
    "flag": "flags/ua.png",
    "name": "de l'Ukraine",
    "capital": "Kiev"
    },
    {
    "flag": "flags/ae.png",
    "name": "des Emirats Arabes Unis",
    "capital": "Abu Dhabi"
    },
    {
    "flag": "flags/gb.png",
    "name": "du Royaume-Uni",
    "capital": "Londres"
    },
    {
    "flag": "flags/us.png ",
    "name": "des U.S.A",
    "capital": "Washington D.C."
    },
    {
    "flag": "flags/uy.png",
    "name": "de l'Uruguay",
    "capital": "Montevideo"
    },
    {
    "flag": "flags/uz.png",
    "name": "de l'Ouzbekistan",
    "capital": "Tashkent"
    },
    {
    "flag": "flags/vu.png",
    "name": "du Vanuatu",
    "capital": "Port-Vila"
    },
    {
    "flag": "flags/ve.png",
    "name": "du Vénézuela",
    "capital": "Caracas"
    },
    {
    "flag": "flags/vn.png",
    "name": "du Vietnam",
    "capital": "Hanoï"
    },
    {
    "flag": "flags/ye.png",
    "name": "du Yémen",
    "capital": "Sanaa"
    },
    {
    "flag": "flags/zm.png",
    "name": "de la Zambie",
    "capital": "Lusaka"
    },
    {
    "flag": "flags/zw.png",
    "name": "du Zimbabwe",
    "capital": "Harare"
    },
    {
    "flag": "flags/va.png",
    "name": "du Vatican",
    "capital": "Vatican"
    }
    ]