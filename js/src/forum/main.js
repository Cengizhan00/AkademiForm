import { extend } from 'flarum/extend';
import app from 'flarum/app';
import IndexPage from 'flarum/components/IndexPage';

app.initializers.add('my-discussions', () => {
  extend(IndexPage.prototype, 'view', function (vdom) {
    if (app.current instanceof IndexPage && app.current.params().tags === 'my-discussions') {
      vdom.children = [];
      vdom.children.push(<div>Kendi Tartışmalarım</div>); // Kendi tartışmalarınızı burada listeleyebilirsiniz
    }
  });
});
