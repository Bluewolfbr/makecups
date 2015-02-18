import domain.repositories.LigasRepository
import org.specs2.execute.AsResult
import play.api.test._
import play.api.test.Helpers._
import domain.models

object TableExampleSpec extends PlaySpecification {

  import infrastructure.persistence.tables._

  lazy val appWithMemoryDatabase = FakeApplication(additionalConfiguration = inMemoryDatabase())


  "A consulta do repositorio de liga" should {

    "Retornar o Campeonato Brasileiro pelo id 1" in new WithApplication(appWithMemoryDatabase){
      val repo : LigasRepository = LigaRepositoryImpl
      val id = repo.insert( repo.build("Campeonato Brasileiro", "Brasil", "Americas").build )

      val ligaBrasileira: models.Liga = repo.consutar(id)

      ligaBrasileira.getNome must equalTo("Campeonato Brasileiro")
    }
  }


}