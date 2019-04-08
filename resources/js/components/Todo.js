import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import FileExplorerTheme from 'react-sortable-tree-theme-minimal';
import SortableTree, { changeNodeAtPath,removeNodeAtPath, getFlatDataFromTree, getTreeFromFlatData } from 'react-sortable-tree';
import 'react-sortable-tree/style.css'; // This only needs to be imported once in your app
import Input from "./Input";

export default class Todo extends Component {

      constructor(props) {
          super(props);
          var handleForUpdate = this.handleForUpdate.bind(this);
          this.state = {
            treeData: [],
          };
      }

      handleForUpdate(){
        this.fechItems(); 
      }  
      
      componentDidMount() {
        this.fechItems(); // Fech items on start
      }

      // function for change node position on database
      moveNode(args){
        const {node, nextParentNode } = args;
        let task = 'http://todolistvibbra-env.62ibvmp7mz.us-east-2.elasticbeanstalk.com/api/tasks/' + node.id;
        let parentnode;
        if(nextParentNode != null){
            parentnode = nextParentNode.id;
        }else{
            parentnode = null
        }
        axios.put(task, {
            parent: parentnode
        })
      }
      
      fechItems(){
          axios.get('http://todolistvibbra-env.62ibvmp7mz.us-east-2.elasticbeanstalk.com/api/tasks/'+this.props.todoid).then((response) => {
              this.setState({
                treeData: getTreeFromFlatData({
                    flatData: response.data.map(node => ({ ...node, title: node.name })),
                    getKey: node => node.id, // resolve a node's key
                    getParentKey: node => node.parent, // resolve a node's parent's key
                    rootKey: null, // The value of the parent key when there is no parent (i.e., at root level)
                  })
              })
          })
      }

      render() {
        var handleForUpdate =  this.handleForUpdate;
        const getNodeKey = ({ treeIndex }) => treeIndex;                
        return (
          <div>
            <Input handleForUpdate = {handleForUpdate.bind(this)} todoId={this.props.todoid}/>
            <div
              style={{ display: 'flex', flexDirection: 'column', height: '100vh' }}
            >
            <div style={{ flex: '1 0 50%', padding: '0 0 0 15px' }}>
              <SortableTree
                theme={FileExplorerTheme}
                treeData={this.state.treeData}
                rowHeight={90}
                style={{width: '800px'}}
                scaffoldBlockPxWidth={70}                
                onChange={treeData => this.setState({ treeData })}             
                onMoveNode={this.moveNode }
                  generateNodeProps={({ node, path }) => ({
                    buttons: [
                      <div className="checkbox">
                        <input
                          type="checkbox"
                          id={node.id + "-check"}
                          name={node.id + "-check"}
                          defaultChecked={node.status}
                          onChange={(event) => {
                            const status = event.target.checked;
                            let task_id = 'http://todolistvibbra-env.62ibvmp7mz.us-east-2.elasticbeanstalk.com/api/tasks/' + node.id;
                            axios.put(task_id, {
                                status: status
                            }) //Save in DB
                            this.setState(state => ({
                              treeData: changeNodeAtPath({
                                treeData: state.treeData,
                                path,
                                getNodeKey,
                                newNode: { ...node, status },
                              }),
                            }));
                          }}
                        />
                        <label htmlFor={node.id + "-check"}>
                          <span></span>
                        </label> 
                      </div>                     
                      ,
                      <button
                        className="trash_button"
                        onClick={() =>
                          {
                            let task_id = 'http://todolistvibbra-env.62ibvmp7mz.us-east-2.elasticbeanstalk.com/api/tasks/' + node.id;
                            axios.delete(task_id, {});
                            console.log(task_id)                                                       
                            this.setState(state => ({
                              treeData: removeNodeAtPath({
                                treeData: state.treeData,
                                path,
                                getNodeKey,
                              }),
                            }))
                          }
                        }
                      >
                        <i className="fas fa-trash-alt"></i>
                      </button>,
                    ],                                       
                    title: (
                      <input className={(node.status ? 'ativo' : 'not' ) + " input_todo"} 
                        style={{ fontSize: '1.1rem' }}
                        value={node.name}
                        onChange={event => {
                          const name = event.target.value;
                          let task_id = 'http://todolistvibbra-env.62ibvmp7mz.us-east-2.elasticbeanstalk.com/api/tasks/' + node.id;
                          axios.put(task_id, {
                              name: name
                          })
                          this.setState(state => ({
                            treeData: changeNodeAtPath({
                              treeData: state.treeData,
                              path,
                              getNodeKey,
                              newNode: { ...node, name },
                            }),
                          }));
                        }}
                      />
                    ),
                  })}                    
              />
            </div>
            </div>
          
          </div>
        );
      }
}

if(document.getElementById('todo')) {
  const el = document.getElementById('todo')
  const props = Object.assign({}, el.dataset)
  ReactDOM.render(<Todo {...props} />, el);
}
