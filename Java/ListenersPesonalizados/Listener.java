package Aprendizado.ListenersPesonalizados;

import java.awt.event.ActionEvent;
import java.util.EventListener;

@FunctionalInterface
public interface Listener extends EventListener {
    public void perform(ActionEvent e);
}
