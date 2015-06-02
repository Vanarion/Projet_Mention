package com.example.maxime.arbitre1;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.widget.Button;
import android.widget.TextView;

/**
 * Created by Maxime on 31/05/2015.
 */
public class matchActivity extends Activity {
    final String EXTRA_COURT = "";
    final String EXTRA_MATCH = "";
    final String EXTRA_SCORE1 = "";
    final String EXTRA_SCORE2 = "";

    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.match);

        Intent matchIntent = getIntent();
        Bundle extras = matchIntent.getExtras();

        final TextView courtDisplay = (TextView) findViewById(R.id.court_display);
        final TextView matchDisplay = (TextView) findViewById(R.id.match_display);
        final TextView score1 = (TextView) findViewById(R.id.score1);
        final TextView score2 = (TextView) findViewById(R.id.score2);

        if (matchIntent != null) {
            courtDisplay.setText(extras.getString("EXTRA_COURT"));
            matchDisplay.setText(extras.getString("EXTRA_MATCH"));
            score1.setText(extras.getString("EXTRA_SCORE1"));
            score2.setText(extras.getString("EXTRA_SCORE2"));
        }
    }
}
