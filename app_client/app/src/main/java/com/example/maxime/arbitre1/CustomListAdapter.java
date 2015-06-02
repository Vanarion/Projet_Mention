package com.example.maxime.arbitre1;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.ImageView;
import android.widget.TextView;

import java.util.ArrayList;

/**
 * Created by Maxime on 26/04/2015.
 */
public class CustomListAdapter extends BaseAdapter {

    ArrayList<Court> listCourts;
    LayoutInflater layoutInflater;

    @Override
    public int getCount() {
        return listCourts.size();
    }

    @Override
    public Object getItem(int arg0) {
        return listCourts.get(arg0);
    }

    @Override
    public long getItemId(int arg0) {
        return arg0;
    }

    public CustomListAdapter(Context context, ArrayList<Court> listCourts) {
        this.listCourts = listCourts;
        layoutInflater = LayoutInflater.from(context);
    }

    public View getView(int arg0, View arg1, ViewGroup arg2) {

        ViewHolder holder;

        if (arg1==null)
        {
            arg1= layoutInflater.inflate(R.layout.row_list, null);
            holder = new ViewHolder();
    // NomView correspondant à la textView associé au nom
            holder.MatchView = (TextView) arg1.findViewById(R.id.match);
    // SiteView correspondant à la textView associé au site
            holder.CourtView = (TextView) arg1.findViewById(R.id.court);
    // LogoView correspondant à la textView associé au logo
            holder.LogoView = (ImageView) arg1.findViewById(R.id.logo);
    //tagguer notre objet pour pouvoir le récupérer à la prochaine mise à jour graphique.
            arg1.setTag(holder);
        }
        else
        {
            holder = (ViewHolder) arg1.getTag();
        }
// mettre les données dans chaque composante associée
// listEcoles.get(arg0).getNom() : extraire le nom de la listEcoles etc.
        holder.MatchView.setText(listCourts.get(arg0).getMatch());
        holder.CourtView.setText(listCourts.get(arg0).getCourt());
        holder.LogoView.setImageDrawable(listCourts.get(arg0).getLogo());

        return arg1;

    }

    static class ViewHolder {
        TextView MatchView;
        TextView CourtView;
        ImageView LogoView;                                                             }
}

