package com.example.maxime.arbitre1;

import android.app.Activity;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.AdapterView;
import android.widget.Button;
import android.widget.ListView;
import android.widget.TextView;
import android.widget.AdapterView.OnItemClickListener;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;

/**
 * Created by Maxime on 21/04/2015.
 */
public class loggedActivity extends Activity {
    final String EXTRA_LOGIN = "user_login";
    final String EXTRA_PASSWORD = "user_password";
    final String EXTRA_COURT = "";
    final String EXTRA_MATCH = "";
    final String EXTRA_SCORE1 = "";
    final String EXTRA_SCORE2 = "";
    ListView lv;
/*    String[] tab = {"Court Phillipe Chatrier","Court Suzanne Lenglen","Court n°1","Court annexe 1","Court annexe 2"}; */
    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.loggedlistmatch);
        new AsyncTaskParseJson().execute();
        Log.i("test", EXTRA_LOGIN);
        // On récupère l'intent (le mdp est caché)
        Intent intent = getIntent();
        TextView loginDisplay = (TextView) findViewById(R.id.email_display);
/*      TextView passwordDisplay = (TextView) findViewById(R.id.password_display);  */
        if (intent != null) {
            loginDisplay.setText(intent.getStringExtra(EXTRA_LOGIN));
/*          passwordDisplay.setText(intent.getStringExtra(EXTRA_PASSWORD));  */
        }

        lv = (ListView)findViewById(R.id.currentmatch);
        final ArrayList<Court> court_details = getListData();

        lv.setAdapter(new CustomListAdapter(this, court_details));
        final Button playedButton = (Button) findViewById(R.id.button0);

        // On click listener pour le bouton des matchs déjà joués
        playedButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent2 = new Intent(loggedActivity.this, playedActivity.class);
                startActivity(intent2);
            }
        });

        lv.setOnItemClickListener(new OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView <?> parent, View view, int arg2,long id)
            {
                Intent matchIntent = new Intent(loggedActivity.this, matchActivity.class);

                TextView matchX = (TextView) view.findViewById(R.id.match);
                TextView courtX = (TextView) view.findViewById(R.id.court);
                String score1X = "15";
                String score2X = "30";

                Bundle extras = new Bundle();
                extras.putString("EXTRA_COURT", courtX.getText().toString());
                extras.putString("EXTRA_MATCH", matchX.getText().toString());
                extras.putString("EXTRA_SCORE1", score1X.toString());
                extras.putString("EXTRA_SCORE2", score2X.toString());
                matchIntent.putExtras(extras);

                startActivity(matchIntent);
            }
        });

    }

    private ArrayList<Court> getListData(){

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

    public class AsyncTaskParseJson extends AsyncTask<String, String, String> {
        final String TAG = "AsyncTaskParseJson.java";

        // set your json string url here
            String yourJsonStringUrl = "http://projet.zz.mu/projets/json/test.php";
        // contacts JSONArray
        JSONArray dataJsonArr = null;

        @Override
        protected void onPreExecute() {}
        @Override
        protected String doInBackground(String... arg0) {
            try {
                // instantiate our json parser
                JsonParser jParser = new JsonParser();
                // get json string from url
                JSONObject json = jParser.getJSONFromUrl(yourJsonStringUrl);
                // get the array of users
                dataJsonArr = json.getJSONArray("return");

                // loop through all users
                for (int i = 0; i < dataJsonArr.length(); i++) {

                    JSONObject c = dataJsonArr.getJSONObject(i);

                    // Storing each json item in variable
                    String message = c.getString("message");
                    //String code = c.getString("last");

                    // show the values in our logcat
                    Log.e(TAG, "message: " + message
                          );

                }

            } catch (JSONException e) {
                e.printStackTrace();
            }

            return null;
        }

        @Override
        protected void onPostExecute(String strFromDoInBg) {}
    }
}