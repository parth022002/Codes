
import javafx.application.Application;
import javafx.scene.Scene;
import javafx.scene.shape.Circle;
import javafx.scene.layout.Pane;
import javafx.geometry.Insets;
import javafx.stage.Stage;

public class Pratical_18 extends Application {
	@Override
	public void start(Stage primaryStage) {5
		Pane pane = new Pane();
		pane.setPadding(new Insets(30, 30, 30, 30));
		Circle circle = new Circle(30

				, 30, 30);
		pane.getChildren().add(circle);

		pane.setOnKeyPressed(e -> {
			switch (e.getCode()) {
				case UP:
					circle.setCenterY(
							circle.getCenterY() > circle.getRadius() ? circle.getCenterY() - 15 : circle.getCenterY());
					break;
				case DOWN:
					circle.setCenterY(
							circle.getCenterY() < pane.getHeight() - circle.getRadius() ? circle.getCenterY() + 15
									: circle.getCenterY());
					break;
				case LEFT:
					circle.setCenterX(
							circle.getCenterX() > circle.getRadius() ? circle.getCenterX() - 15 : circle.getCenterX());
					break;
				case RIGHT:
					circle.setCenterX(
							circle.getCenterX() < pane.getWidth() - circle.getRadius() ? circle.getCenterX() + 15
									: circle.getCenterX());
			}
		});

		Scene scene = new Scene(pane, 200, 200);
		primaryStage.setTitle("OOP_18");
		primaryStage.setScene(scene);
		primaryStage.show();
		pane.requestFocus();
	}

	public static void main(String[] args) {
		Application.launch(args);
	}
}