package com.example.maxime.arbitre1;


import android.graphics.drawable.Drawable;

/**
 * Created by Maxime on 26/04/2015.
 */
public class Court {

    String match;
    String court;
    Drawable logo;

    public String getMatch() {
        return match;
    }
    public void setMatch(String match) {
        this.match = match;
    }
    public String getCourt() {
        return court;
    }
    public void setCourt(String court) {
        this.court = court;
    }
    public Drawable getLogo() {
        return logo;
    }
    public void setLogo(Drawable logo) {
        this.logo = logo;
    }
}
