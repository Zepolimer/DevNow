<?php

    function postedAt(string $datePost) {
        $dateStart = new DateTime($datePost);
        $today = new DateTime(date("Y-m-d"));
        $interval = $dateStart->diff($today);
    
        if($interval->format('%a') == '0'){
            echo $interval->format('<p class="postedToday"><span class="emoji">&#x1F552;</span>aujourd\'hui</p>');
        } else {
            if($interval->format('%a') != '0' AND $interval->format('%a') >= '31'){
                echo $interval->format('<p class="postedSince"><span class="emoji">&#x1F5D3;</span>%m mois</p>');
            } else {
                echo $interval->format('<p class="postedSince"><span class="emoji">&#x1F5D3;</span>%a jours</p>');
            }
        }
    }