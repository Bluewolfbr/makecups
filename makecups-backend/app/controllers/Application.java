package controllers;

import domain.models.campeonato.CampeonatoBuilder;
import play.*;
import play.mvc.*;

import views.html.*;

import javax.inject.Inject;

public class Application extends Controller {

    public Result index() {

        return ok(index.render("Your new application is ready."));
    }

}
