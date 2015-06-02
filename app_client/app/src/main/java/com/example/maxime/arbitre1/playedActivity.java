package com.example.maxime.arbitre1;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.widget.ArrayAdapter;
import android.widget.ListView;

import java.util.ArrayList;

/**
 * Created by Maxime on 22/04/2015.
 */
public class playedActivity extends Activity {
    ListView lv2;
    String[] tab2 = {"match1","match2","match3","match4","match5","match6","match7"};

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.playedmatch);

        Intent intent2 = getIntent();
        lv2 = (ListView)findViewById(R.id.playedmatch);
        final ArrayList<Court> court_details = getListData();
        lv2.setAdapter(new CustomListAdapter(this, court_details));

        // ArrayAdapter arrayadp = new ArrayAdapter(this,  android.R.layout.simple_list_item_1, tab2);
        // lv2.setAdapter(arrayadp);


    }

    private ArrayList<Court> getListData() {

        ArrayList<Court> resultats = new ArrayList<Court>();

        Court newsData = new Court();
        newsData.setMatch("Federer - Nadal");
        newsData.setCourt("Court Phillipe Chatrier");
        newsData.setLogo(getResources().getDrawable(R.drawable.logo));
        resultats.add(newsData);

        newsData = new Court();
        newsData.setMatch("Djokovic - Ferrer");
        newsData.setCourt("Court Suzanne Lenglen");
        newsData.setLogo(getResources().getDrawable(R.drawable.logo));
        resultats.add(newsData);

        newsData = new Court();
        newsData.setMatch("Monfils - Mes couilles");
        newsData.setCourt("Court n°1");
        newsData.setLogo(getResources().getDrawable(R.drawable.logo));
        resultats.add(newsData);

        newsData = new Court();
        newsData.setMatch("Match 4");
        newsData.setCourt("Court annexe 1");
        newsData.setLogo(getResources().getDrawable(R.drawable.logo));
        resultats.add(newsData);

        newsData = new Court();
        newsData.setMatch("Match 5");
        newsData.setCourt("Court annexe 2");
        newsData.setLogo(getResources().getDrawable(R.drawable.logo));
        resultats.add(newsData);

        return resultats;
    }
}
