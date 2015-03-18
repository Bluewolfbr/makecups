package domain.entity;

public class Liga {

	private int id;
	private String nome;
	
	public Liga(int id, String nome) {
		this.id = id;
		this.nome = nome;
	}
	
	public int getId() {
		return id;
	}
	
	public String getNome() {
		return nome;
	}
	
}
