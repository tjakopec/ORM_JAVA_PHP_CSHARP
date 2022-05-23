package jakopec;


import jakopec.model.*;
import jakopec.pomocno.HibernateUtil;
import org.hibernate.Session;

import java.util.ArrayList;
import java.util.List;

public class Start {

    private  Session s ;
    private List<Partija> partije;
    private Igrac igrac1;
    private Igrac igrac2;
    private Igrac igrac3;
    private Igrac igrac4;
    private Lokacija lokacija;

    public Start() {
        s = HibernateUtil.getSession();
        kreirajRucno();
        // podaci iz JAVA objekata kreniranih ručno
        for (Partija partija: partije) {
            System.out.println(partija);
        }
        // Podaci iz baze
        List<Partija> partijeDvaIgraca = s.createQuery(
                "from Partija",Partija.class).list();
        for (Partija partija: partijeDvaIgraca) {
            System.out.println(partija);
        }


    }


    private void kreirajRucno(){
        s.beginTransaction();
        partije = new ArrayList<>();
        igrac1 = kreirajIgraca1();
        s.persist(igrac1);
        igrac2 = kreirajIgraca2();
        s.persist(igrac2);
        igrac3 = new Igrac(null, "Marija", "Zimska", "https://picsum.photos/200", Spol.ZENSKO.getId());
        s.persist(igrac3);
        igrac4 = new Igrac(null, "Anita", "Račman", "https://picsum.photos/200", Spol.ZENSKO.getId());
        s.persist(igrac4);
        lokacija = kreirajLokaciju();
        s.persist(lokacija);
        kreirajPartijuDvaIgraca();
        kreirajPartijuTriIgraca();
        kreirajPartijuDvaPara();
        s.getTransaction().commit();

    }

    private void kreirajPartijuDvaPara() {
        PartijaDvaPara partija = new PartijaDvaPara();
        partija.setDoKolikoSeIgra(501);
        partija.setLokacija(lokacija);
        partija.setUnosi(igrac1);
        List<Igrac> igraci = new ArrayList<>();
        igraci.add(igrac1);
        igraci.add(igrac2);
        igraci.add(igrac3);
        igraci.add(igrac4);
        partija.setIgraci(igraci);
        partija.setMjesanja(kreirajMjesanjaDvaPara());
        s.persist(partija);
        partije.add(partija);
    }

    private List<Mjesanje> kreirajMjesanjaDvaPara() {

        List<Mjesanje> mjesanja = new ArrayList<>();

        MjesanjeDvaUnosa m = new MjesanjeDvaUnosa();
        m.setBodovaPrviUnos(10);
        m.setBodovaDrugiUnos(152);
        m.setZvanjePrviUnos(0);
        m.setZvanjeDrugiUnos(20);
        s.persist(m);
        mjesanja.add(m);




        m = new MjesanjeDvaUnosa();
        m.setBodovaPrviUnos(152);
        m.setBodovaDrugiUnos(10);
        m.setZvanjePrviUnos(0);
        m.setZvanjeDrugiUnos(20);
        m.setStiglja(true);
        s.persist(m);
        mjesanja.add(m);



        return mjesanja;

    }

    private void kreirajPartijuTriIgraca() {
        PartijaTriIgraca partija = new PartijaTriIgraca();
        partija.setDoKolikoSeIgra(501);
        partija.setLokacija(lokacija);
        partija.setUnosi(igrac1);
        List<Igrac> igraci = new ArrayList<>();
        igraci.add(igrac1);
        igraci.add(igrac2);
        igraci.add(igrac3);
        partija.setIgraci(igraci);
        partija.setMjesanja(kreirajMjesanjaTriIgraca());
        s.persist(partija);
        partije.add(partija);
    }

    private List<Mjesanje> kreirajMjesanjaTriIgraca() {
        List<Mjesanje> mjesanja = new ArrayList<>();

        MjesanjeTriUnosa m = new MjesanjeTriUnosa();
        m.setBodovaPrviUnos(10);
        m.setBodovaDrugiUnos(76);
        m.setZvanjePrviUnos(0);
        m.setZvanjeDrugiUnos(20);
        m.setBodovaTreciUnos(76);
        s.persist(m);
        mjesanja.add(m);

        for(int i=0;i<5;i++) {
            m = new MjesanjeTriUnosa();
            m.setBodovaPrviUnos(10);
            m.setBodovaDrugiUnos(76);
            m.setZvanjePrviUnos(0);
            m.setZvanjeDrugiUnos(20);
            m.setBodovaTreciUnos(76);
            s.persist(m);
            mjesanja.add(m);
        }


        return mjesanja;
    }

    private void kreirajPartijuDvaIgraca() {
        PartijaDvaIgraca partija = new PartijaDvaIgraca();

        partija.setDoKolikoSeIgra(501);
        partija.setLokacija(lokacija);
        partija.setUnosi(igrac1);
        List<Igrac> igraci = new ArrayList<>();
        igraci.add(igrac1);
        igraci.add(igrac2);
        partija.setIgraci(igraci);
        partija.setMjesanja(kreirajMjesanjaDvaIgraca());
        s.persist(partija);
        partije.add(partija);
    }

    private List<Mjesanje> kreirajMjesanjaDvaIgraca() {
        List<Mjesanje> mjesanja = new ArrayList<>();

        MjesanjeDvaUnosa m = new MjesanjeDvaUnosa();
        m.setBodovaPrviUnos(10);
        m.setBodovaDrugiUnos(152);
        m.setZvanjePrviUnos(0);
        m.setZvanjeDrugiUnos(20);
        s.persist(m);
        mjesanja.add(m);

        m = new MjesanjeDvaUnosa();
        m.setBodovaPrviUnos(152);
        m.setBodovaDrugiUnos(10);
        m.setZvanjePrviUnos(0);
        m.setZvanjeDrugiUnos(20);
        m.setStiglja(true);
        s.persist(m);
        mjesanja.add(m);

        return mjesanja;
    }

    private Lokacija kreirajLokaciju() {
        Lokacija l = new Lokacija();
        l.setNaziv("Caffe Bar Peppermint");
        l.setLatitude(45.5605825);
        l.setLongitude(18.6098766);
        return l;
    }

    private Igrac kreirajIgraca1() {
        Igrac i = new Igrac();
        i.setIme("Tomislav");
        i.setPrezime("Jakopec");
        i.setUrlSlika("https://picsum.photos/200");
        i.setSpol(Spol.MUSKO.getId());
        return i;
    }

    private Igrac kreirajIgraca2() {
        Igrac i = new Igrac();
        i.setIme("Marijan");
        i.setPrezime("Zidar");
        i.setUrlSlika("https://picsum.photos/200");
        i.setSpol(Spol.MUSKO.getId());
        return i;
    }


    public static void main(String[] args) {
        new Start();
    }

}
