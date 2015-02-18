/*
The MIT License (MIT)

Copyright (c) 2015 Bluewolf Team

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
*/
package infrastructure.persistence.tables

import java.{lang, util}
import java.util.{Collections, Optional}

import domain.models
import domain.repositories.LigasRepository
import domain.repositories.LigasRepository.LigaBuilder
import play.api.db.slick.Config.driver.simple._
import scala.collection.JavaConversions
import scala.slick.lifted.{Column, Tag}

case class Liga(id: Long,
                nome: String,
                pais: String,
                regiao: String)

class Ligas(tag: Tag) extends Table[Liga](tag, "LIGAS"){

  def id= column[String]("ID", O.PrimaryKey, O.AutoInc)
  def nome = column[String]("NOME")
  def pais = column[String]("PAIS")
  def regiao = column[String]("REGIAO")
  def * = (id, nome, pais, regiao) <> (Liga.tupled, Liga.unapply _)
}


class LigaBuilderImpl(nome: String, pais: String, regiao: String) extends LigaBuilder {

  override def build(): models.Liga = new models.Liga(nome, pais, regiao)
}

object LigaRepositoryImpl extends LigasRepository {

  val ligas = TableQuery[Ligas]

  def converter(l: Ligas): models.Liga = build(l.nome.toString, l.pais.toString, l.regiao.toString).build

  override def consutar(id: lang.Long)(implicit s: Session): models.Liga = {
    val d = Long.box(id)
    play.api.db.slick.DB.withSession{ implicit session =>
      ligas.filter(_.id === d).map( converter ).first
    }
  }


  override def build(nome: String, pais: String, regiao: String): LigaBuilder =
    new LigaBuilderImpl(nome, pais, regiao)

  override def todos()(implicit s: Session): util.List[models.Liga] = {
      ligas.map(converter).list
  }
}