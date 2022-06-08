package jakopec.model;

import jakarta.persistence.*;

import java.util.ArrayList;
import java.util.List;

@Entity
@Inheritance(strategy = InheritanceType.SINGLE_TABLE)
@DiscriminatorColumn(name = "vrsta", discriminatorType = DiscriminatorType.STRING)
@Table(name = "partija")
public abstract class Partija extends Entitet {

    @Column(name = "dokolikoseigra")
    private int doKolikoSeIgra;
    @ManyToOne (fetch = FetchType.LAZY)
    @JoinColumn(name="lokacija")
    private Lokacija lokacija;
    @ManyToOne (fetch = FetchType.EAGER)
    @JoinColumn(name="unosi")
    private Igrac unosi;
    @OneToMany(mappedBy = "partija")
    private List<Mjesanje> mjesanja = new ArrayList<>();
    @ManyToMany (fetch = FetchType.EAGER)
    @JoinTable(
            joinColumns = @JoinColumn(name = "partija"),
            inverseJoinColumns = @JoinColumn(name = "igrac"))
    private List<Igrac> igraci = new ArrayList<>();


    public int getDoKolikoSeIgra() {
        return doKolikoSeIgra;
    }

    public void setDoKolikoSeIgra(int doKolikoSeIgra) {
        this.doKolikoSeIgra = doKolikoSeIgra;
    }

    public Lokacija getLokacija() {
        return lokacija;
    }

    public void setLokacija(Lokacija lokacija) {
        this.lokacija = lokacija;
    }

    public Igrac getUnosi() {
        return unosi;
    }

    public void setUnosi(Igrac unosi) {
        this.unosi = unosi;
    }

    public List<Mjesanje> getMjesanja() {
        return mjesanja;
    }

    public void setMjesanja(List<Mjesanje> mjesanja) {
        this.mjesanja = mjesanja;
    }

    public List<Igrac> getIgraci() {
        return igraci;
    }

    public void setIgraci(List<Igrac> igraci) {
        this.igraci = igraci;
    }

    public Rezulat getRezultat() {
        Rezulat rezulat = new Rezulat(getMjesanja().stream().mapToInt(x->x.getRezultat().getPrvi()).sum(),
                getMjesanja().stream().mapToInt(x->x.getRezultat().getDrugi()).sum());
        return rezulat;
    }

    public boolean isIgraGotova() {

        Rezulat rezultat = getRezultat();

        if(rezultat.isPocetak()){
            return false;
        }

        if(rezultat.getTreci()==0){
            return rezultat.getPrvi()==rezultat.getDrugi() ? false : rezultat.getPrvi()>getDoKolikoSeIgra() || rezultat.getDrugi()>getDoKolikoSeIgra();
        }else{
            if(rezultat.getPrvi()==rezultat.getDrugi() || rezultat.getPrvi()==rezultat.getTreci() || rezultat.getDrugi()==rezultat.getTreci()){
                return false;
            }

            if (rezultat.getPrvi()>getDoKolikoSeIgra() || rezultat.getDrugi()>getDoKolikoSeIgra() || rezultat.getTreci()>getDoKolikoSeIgra()){
                return true;
            }

        }

        return false;
    }
}
